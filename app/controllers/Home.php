<?php

class Home extends Controller
{

	public function __construct()
	{
		if (!isset($_SESSION['user'])) {
			return $this->redirect('login', 'index');
		}
	}

	public function index()
	{
		return $this->view('home/index');
	}
}
