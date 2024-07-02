<?php

class UserModel extends Model
{

	// nama tabel yang digunakan pada model ini
	protected $table = 'users';

	// fungsi khusus untuk hash password user
	public function hash($string)
	{
		return md5($string);
	}
}
