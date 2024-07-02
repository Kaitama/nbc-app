<?php

class App
{
	// properti controller dan method default
	protected $controller = 'Home';
	protected $method = 'index';
	protected $params = array();
	// konstruktor
	public function __construct()
	{
		// sanitasi url
		$url = $this->parsing();
		// cek apakah controller ada?
		if (isset($url[0]) && file_exists("../app/controllers/{ucfirst($url[0])}.php")) {
			$this->controller = ucfirst($url[0]);
			unset($url[0]);
		}
		require_once "../app/controllers/{$this->controller}.php";
		$this->controller = new $this->controller;

		// cek apakah method ada?
		if (isset($url[1])) {
			if (method_exists($this->controller, $url[1])) {
				$this->method = $url[1];
				unset($url[1]);
			}
		}

		// cek params jika ada
		if (!empty($url)) {
			$this->params = array_values($url);
		}
		// jalankan controller dan method
		call_user_func_array([
			$this->controller,
			$this->method
		], $this->params);
	}

	// metode sanitasi dan parsing url ke dalam bentuk array
	public function parsing()
	{
		if (isset($_GET['url'])) {
			$url = rtrim($_GET['url'], '/');
			$url = filter_var($url, FILTER_SANITIZE_URL);
			$url = explode('/', $url);
			return $url;
		}
	}
}
