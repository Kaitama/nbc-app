<?php

class Register extends Controller
{
	// tampilan halaman register
	public function index()
	{
		return $this->view('register/index');
	}

	// proses registrasi
	public function process()
	{
		// terima data dari form
		$data = $_POST;

		// cek password konfirmasi
		if ($data['password'] === $data['password_confirmation']) {
			// persiapkan data yang akan disimpan
			$data_user = [
				'username' => $data['username'],
				'password' => $this->model('UserModel')->hash($data['password']),
				'role' => 'customer'
			];
			// pangil method store dari model
			$result = $this->model('UserModel')->store($data_user);
			// cek jika sukses
			if ($result) {
				$this->success('Registrasi Berhasil!', 'Silahkan login dengan akun yang telah dibuat.');
				return $this->redirect('login', 'index');
			}
			// jika gagal 
			else {
				$_SESSION['message'] = [
					'type' => 'negative',
					'title' => 'Registrasi Gagal!',
					'body' => 'Terjadi kesalahan, silahkan coba lagi dalam beberapa saat.'
				];
				return $this->redirect('register', 'index');
			}
		} else {
			$_SESSION['message'] = [
				'type' => 'negative',
				'title' => 'Registrasi Gagal!',
				'body' => 'Password yang anda ketikkan tidak sama.'
			];
			return $this->redirect('register', 'index');
		}
	}
}
