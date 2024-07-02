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
}
