<?php

class Home extends Controller
{

	public function index()
	{
    // if (!isset($_SESSION['user'])) {
		// 	return $this->view('login/index');
		// }
		return $this->view('home/index');
	}
}
