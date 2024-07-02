<?php

class User extends Controller
{
	public function index()
	{
		// panggil data semua user
		$users = $this->model('UserModel')->getAll();
		return $this->view('user/index', $users);
	}

	// method create data
	public function create()
	{
		return $this->view('user/create');
	}

	// method simpan data
	public function store()
	{
		//
	}
}
