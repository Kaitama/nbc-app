<?php
class Controller
{
	// metode pemanggilan layout
	public function view($page, $data = array())
	{
		require_once "../app/views/layout/header.php";
		require_once "../app/views/{$page}.php";
		require_once "../app/views/layout/footer.php";
	}
	// metode pemanggilan model
	public function model($model)
	{
		require_once "../app/models/{$model}.php";
		return new $model;
	}
	// metode peralihan halaman
	public function redirect(
		$controller,
		$method = 'index',
		$params = array()
	) {
		$params_str = implode('/', $params);
		header('location: ' . BASE_URL . '/' . $controller . '/' . $method . '/' . $params_str);
		exit;
	}

	// method pesan sukses
	public function success($title, $body = '')
	{
		return $_SESSION['message'] = [
			'type' => 'positive',
			'title' => $title,
			'body' => $body
		];
	}

	// method pesan gagal
	public function error($title, $body = '')
	{
		return $_SESSION['message'] = [
			'type' => 'negative',
			'title' => $title,
			'body' => $body
		];
	}

	protected function convertUsia($us)
	{
		if ($us <= 40) {
			return 'A';
		} elseif ($us <= 50) {
			return 'B';
		} elseif ($us <= 60) {
			return 'C';
		} elseif ($us <= 70) {
			return 'D';
		} else {
			return 'E';
		}
	}

	protected function convertGulaDarah($gd)
	{
		if ($gd <= 120) {
			return 'A';
		} elseif ($gd <= 170) {
			return 'B';
		} elseif ($gd <= 220) {
			return 'C';
		} elseif ($gd <= 270) {
			return 'D';
		} else {
			return 'E';
		}
	}

	protected function convertBerat($bb)
	{
		if ($bb <= 40) {
			return 'A';
		} elseif ($bb <= 50) {
			return 'B';
		} elseif ($bb <= 60) {
			return 'C';
		} elseif ($bb <= 70) {
			return 'D';
		} else {
			return 'E';
		}
	}
}
