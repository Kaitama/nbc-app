<?php

class Login extends Controller
{
	// menampilkan halaman login
	public function index()
	{
		if (isset($_SESSION['user'])) {
			return $this->redirect('home', 'index');
		}
		return $this->view('login/index');
	}

	// proses login
	public function process()
	{
		// terima semua data dari form
		$data = $_POST;
		// buat objek koneksi database
		$db = new Database();
		// cari apakah ada user dengan username tersebut
		$db->query("SELECT * FROM users WHERE 
			username='{$data['username']}'
		");
		$user = $db->single();
		// jika user ditemukan dan password cocok
		if ($user && $user['password'] === md5($data['password'])) {
			// hilangkan elemen password dari array user
			unset($user['password']);
			// simpan data user ke dalam session
			$_SESSION['user'] = $user;
			// alihkan halaman ke home
			return $this->redirect('home', 'index');
		}
		// jika user tidak ditemukan atau password tidak cocok
		else {
			$this->error('Login gagal!', 'Username atau password tidak sesuai.');
			// alihkan kembali ke halaman login
			return $this->redirect('login', 'index');
		}
	}

	public function logout()
	{
		// hapus data user dari session
		unset($_SESSION['user']);
		// hapus semua session yang tersisa
		session_destroy();
		return $this->redirect('login', 'index');
	}
}
