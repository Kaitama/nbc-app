<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class Dataset extends Controller
{
	public function __construct()
	{
		if (!isset($_SESSION['user'])) {
			return $this->redirect('login', 'index');
		}
	}

	public function index()
	{
		$patients = $this->model('PatientModel')->getAll();
		return $this->view('dataset/index', $patients);
	}

	public function store()
	{

		if (isset($_POST['submit'])) {
			$tgl_sekarang = date('YmdHis');
			$nama_file_baru = 'data' . $tgl_sekarang . '.xlsx';
			if (is_file('tmp/' . $nama_file_baru)) {
				unlink('tmp/' . $nama_file_baru);
			}
			$ext = pathinfo($_FILES['excel']['name'], PATHINFO_EXTENSION);
			$tmp_file = $_FILES['excel']['tmp_name'];

			if ($ext == "xlsx") {
				$upload = move_uploaded_file($tmp_file, 'tmp/' . $nama_file_baru);
				$reader = new Xlsx();
				$spreadsheet = $reader->load('tmp/' . $nama_file_baru);
				$rows = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
				$num_row = 1;

				// delete old data
				$this->model('DatasetModel')->deleteAll();
				$this->model('PatientModel')->deleteAll();

				foreach ($rows as $key => $row) {
					if ($num_row > 1) {
						$result = $this->model('PatientModel')->store([
							'name' => $row['B'],
							'usia' => $row['C'],
							'berat' => $row['K'],
							'gender' => $row['D'],
							'gd' => $row['E'],
							'pu' => $row['F'],
							'pd' => $row['G'],
							'pp' => $row['H'],
							'swl' => $row['I'],
							'wn' => $row['J'],
							'ket' => $row['L'],
						]);

						if (count($result)) {
							$dts = $this->model('DatasetModel')->store([
								'patient_id' => $result['id'],
								'us' => $this->convertUsia($row['C']),
								'jk' => $row['D'] == 1 ? 'A' : 'B',
								'gd' => $this->convertGulaDarah($row['E']),
								'pu' => $row['F'] == 1 ? 'A' : 'B',
								'pd' => $row['G'] == 1 ? 'A' : 'B',
								'pp' => $row['H'] == 1 ? 'A' : 'B',
								'swl' => $row['I'] == 1 ? 'A' : 'B',
								'wn' => $row['J'] == 1 ? 'A' : 'B',
								'bb' => $this->convertBerat($row['K']),
								'ket' => $row['L'] == 1 ? 'P' : 'N'
							]);
						}
					}
					$num_row++;
				}
				unlink('tmp/' . $nama_file_baru);
				$this->success('Sukses!', 'Data Excel berhasil diimport.');
			} else {
				$this->error('Gagal!', 'Ekstensi file harus xlsx');
			}
		}
		return $this->redirect('dataset', 'index');
	}

	public function destroy($id)
	{
		$ds = $this->model('DatasetModel')->where('patient_id', $id);
		if ($ds) {
			$this->model('DatasetModel')->destroy($ds['id']);
		}
		$pt = $this->model('PatientModel')->destroy($id);
		if ($pt) {
			$this->success('Sukses!', 'Dataset berhasil dihapus.');
		} else {
			$this->error('Gagal!', 'Dataset gagal dihapus.');
		}
		return $this->redirect('dataset', 'index');
	}
}
