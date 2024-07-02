<?php

class Prediksi extends Controller
{

	public function __construct()
	{
		if (!isset($_SESSION['user'])) {
			return $this->redirect('login', 'index');
		}
	}

	public function index()
	{
		return $this->view('prediksi/index');
	}

	public function create()
	{
		$data = $_POST;
		// algoritma naive bayes
		$pasien = [
			'name' => $data['nama'],
			'usia' => $data['usia'],
			'berat' => $data['berat'],
			'gender' => $data['gender'],
			'telepon' => $data['telepon'],
			'alamat' => $data['alamat'],
			'gd' => $data['gd'],
			'pu' => $data['pu'],
			'pd' => $data['pd'],
			'pp' => $data['pp'],
			'swl' => $data['swl'],
			'wn' => $data['wn'],
		];
		$norm = [
			'us' => $this->convertUsia($data['usia']),
			'jk' => $data['gender'] ? 'A' : 'B',
			'gd' => $this->convertGulaDarah($data['gd']),
			'pu' => $data['pu'] ? 'A' : 'B',
			'pd' => $data['pd'] ? 'A' : 'B',
			'pp' => $data['pp'] ? 'A' : 'B',
			'swl' => $data['swl'] ? 'A' : 'B',
			'wn' => $data['wn'] ? 'A' : 'B',
			'bb' => $this->convertBerat($data['berat']),
		];

		$datasets = $this->model('DatasetModel')->getAll();
		$total_data = count($datasets);
		$total_positif = count($this->model('DatasetModel')->where('ket', 'P', true));
		$total_negatif = count($this->model('DatasetModel')->where('ket', 'N', true));
		$p_positif = $total_positif / $total_data;
		$p_negatif = $total_negatif / $total_data;
		// probabilitas setiap kriteria
		// usia
		$us_n_pos = count($this->model('DatasetModel')->whereAnd([
			'us' => $norm['us'],
			'ket' => 'P'
		], true)) / $total_positif;
		$us_n_neg = count($this->model('DatasetModel')->whereAnd([
			'us' => $norm['us'],
			'ket' => 'N'
		], true)) / $total_negatif;

		// jenis kelamin
		$jk_n_pos = count($this->model('DatasetModel')->whereAnd([
			'jk' => $norm['jk'],
			'ket' => 'P'
		], true)) / $total_positif;
		$jk_n_neg = count($this->model('DatasetModel')->whereAnd([
			'jk' => $norm['jk'],
			'ket' => 'N'
		], true)) / $total_negatif;

		// gula darah
		$gd_n_pos = count($this->model('DatasetModel')->whereAnd([
			'gd' => $norm['gd'],
			'ket' => 'P'
		], true)) / $total_positif;
		$gd_n_neg = count($this->model('DatasetModel')->whereAnd([
			'gd' => $norm['gd'],
			'ket' => 'N'
		], true)) / $total_negatif;

		// polyuria
		$pu_n_pos = count($this->model('DatasetModel')->whereAnd([
			'pu' => $norm['pu'],
			'ket' => 'P'
		], true)) / $total_positif;
		$pu_n_neg = count($this->model('DatasetModel')->whereAnd([
			'pu' => $norm['pu'],
			'ket' => 'N'
		], true)) / $total_negatif;

		// polydipsia
		$pd_n_pos = count($this->model('DatasetModel')->whereAnd([
			'pd' => $norm['pd'],
			'ket' => 'P'
		], true)) / $total_positif;
		$pd_n_neg = count($this->model('DatasetModel')->whereAnd([
			'pd' => $norm['pd'],
			'ket' => 'N'
		], true)) / $total_negatif;

		// polyphagia
		$pp_n_pos = count($this->model('DatasetModel')->whereAnd([
			'pp' => $norm['pp'],
			'ket' => 'P'
		], true)) / $total_positif;
		$pp_n_neg = count($this->model('DatasetModel')->whereAnd([
			'pp' => $norm['pp'],
			'ket' => 'N'
		], true)) / $total_negatif;

		// sudden weight loss
		$swl_n_pos = count($this->model('DatasetModel')->whereAnd([
			'swl' => $norm['swl'],
			'ket' => 'P'
		], true)) / $total_positif;
		$swl_n_neg = count($this->model('DatasetModel')->whereAnd([
			'swl' => $norm['swl'],
			'ket' => 'N'
		], true)) / $total_negatif;

		// weakness
		$wn_n_pos = count($this->model('DatasetModel')->whereAnd([
			'wn' => $norm['wn'],
			'ket' => 'P'
		], true)) / $total_positif;
		$wn_n_neg = count($this->model('DatasetModel')->whereAnd([
			'wn' => $norm['wn'],
			'ket' => 'N'
		], true)) / $total_negatif;

		// berat badan
		$bb_n_pos = count($this->model('DatasetModel')->whereAnd([
			'bb' => $norm['bb'],
			'ket' => 'P'
		], true)) / $total_positif;
		$bb_n_neg = count($this->model('DatasetModel')->whereAnd([
			'bb' => $norm['bb'],
			'ket' => 'N'
		], true)) / $total_negatif;

		// perkalian tiap nilai probabilitas
		$prob_pos = $p_positif * $us_n_pos * $jk_n_pos * $gd_n_pos * $pu_n_pos * $pd_n_pos * $pp_n_pos * $swl_n_pos * $wn_n_pos * $bb_n_pos;

		$prob_neg = $p_negatif * $us_n_neg * $jk_n_neg * $gd_n_neg * $pu_n_neg * $pd_n_neg * $pp_n_neg * $swl_n_neg * $wn_n_neg * $bb_n_neg;

		// hasil diagnosa
		try {
			$diag_pos = ($prob_pos / ($prob_neg + $prob_pos)) * 100;
		} catch (DivisionByZeroError $e) {
			$diag_pos = 0;
		}
		try {
			$diag_neg = ($prob_neg / ($prob_neg + $prob_pos)) * 100;
		} catch (DivisionByZeroError $e) {
			$diag_neg = 0;
		}
		// $diag_pos = ($prob_pos / ($prob_neg + $prob_pos)) * 100;
		// $diag_neg = ($prob_neg / ($prob_neg + $prob_pos)) * 100;

		$pasien['ket'] = ($diag_pos > $diag_neg) ? 1 : 0;
		$norm['ket'] = ($diag_pos > $diag_neg) ? 'P' : 'N';

		$_SESSION['prediksi'] = [
			'patient' => $pasien,
			'dataset' => $norm,
		];

		return $this->view('prediksi/result', ['patient' => $pasien]);
	}

	public function store()
	{
		$result = $this->model('PatientModel')->store($_SESSION['prediksi']['patient']);
		if (count($result)) {
			$dts = $this->model('DatasetModel')->store($_SESSION['prediksi']['dataset']);
		}
		$this->success('Sukses!', 'Dataset pasien berhasil disimpan.');
		unset($_SESSION['prediksi']);
		return $this->redirect('dataset', 'index');
	}
}
