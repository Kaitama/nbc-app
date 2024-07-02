<?php
class Model
{
	// inisialisasi properti
	protected $db;
	protected $table;

	// konstruktor
	public function __construct()
	{
		// pembuatan objek dari kelas Database
		$this->db = new Database;
	}

	// metode baca semua data dari tabel
	public function getAll()
	{
		$this->db->query(
			'SELECT * FROM ' . $this->table
		);
		return $this->db->multiple();
	}

	// metode baca data berdasarkan id
	public function find($id)
	{
		$this->db->query(
			'SELECT * FROM ' . $this->table . ' WHERE id=:id'
		);
		$this->db->bind('id', $id);
		return $this->db->single();
	}

	// metode hapus data berdasarkan id
	public function destroy($id)
	{
		$this->db->query(
			'DELETE FROM ' . $this->table . ' WHERE id=:id'
		);
		$this->db->bind('id', $id);
		$this->db->execute();
		return $this->db->count();
	}

	public function deleteAll()
	{
		$this->db->query(
			'DELETE FROM ' . $this->table
		);
		$this->db->execute();
		return $this->db->count();
	}

	// metode ambil data berasarkan kolom tertentu
	public function where($column, $value, $multiple = false)
	{
		$this->db->query(
			'SELECT * FROM ' . $this->table . ' WHERE ' . $column . '=:value'
		);
		$this->db->bind('value', $value);
		if ($multiple) {
			return $this->db->multiple();
		}
		return $this->db->single();
	}

	public function whereAnd($pairs = [], $multiple = false)
	{
		$string = [];
		foreach ($pairs as $col => $val) {
			$string[] = $col . '=:' . $col;
		}
		$query = "SELECT * FROM $this->table WHERE " . implode(' AND ', $string);
		$this->db->query($query);

		foreach ($pairs as $k => $v) {
			$this->db->bind($k, $v);
		}
		if ($multiple) {
			return $this->db->multiple();
		}
		return $this->db->single();
	}

	// Method simpan data (store)
	// format data yang disimpan harus dalam bentuk array
	// ['nama_kolom' => 'data']
	public function store($data)
	{
		// ambil key dari array
		$key = array_keys($data);
		// susun string query sql
		$query = "INSERT INTO $this->table (" . implode(', ', $key) . ")
			VALUES (:" . implode(", :", $key) . ")";
		// persiapkan query
		$this->db->query($query);
		// bind data ke query
		foreach ($data as $key => $value) {
			$this->db->bind($key, $value);
		}
		// eksekusi query
		$this->db->execute();

		$last_id = $this->db->lastId();
		return $this->find($last_id);
	}
}
