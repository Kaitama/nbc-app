<?php
class Database
{
	// inisialisasi properti
	private $host = DB_HOST;
	private $user = DB_USER;
	private $pass = DB_PASS;
	private $name = DB_NAME;
	private $dbh, $stmt;
	// konstruktor
	public function __construct()
	{
		// data source name
		$dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->name;
		// array options untuk database handler
		$options = [
			PDO::ATTR_PERSISTENT => true, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		];
		// koneksi database
		try {
			// sukses
			$this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
		} catch (PDOException $e) { // gagal
			die($e->getMessage());
		}
	}
	// metode persiapan query
	public function query($q)
	{
		$this->stmt = $this->dbh->prepare($q);
	}
	// metode data binding, untuk mencegah SQL injection
	public function bind($param, $value, $type = null)
	{
		if (is_null($type)) {
			switch (true) {
				case is_int($value):
					$type = PDO::PARAM_INT;
					break;
				case is_bool($value):
					$type = PDO::PARAM_BOOL;
					break;
				case is_null($value) || $value === '':
					$type = PDO::PARAM_NULL;
					break;
				default:
					$type = PDO::PARAM_STR;
					break;
			}
		}
		$this->stmt->bindValue($param, $value, $type);
	}
	// metode jalankan query
	public function execute()
	{
		$this->stmt->execute();
	}
	// metode pemanggilan data kolektif
	public function multiple()
	{
		$this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	// metode pemanggilan data singular
	public function single()
	{
		$this->execute();
		return $this->stmt->fetch(PDO::FETCH_ASSOC);
	}
	// metode hitung data yang diperbarui
	public function count()
	{
		return $this->stmt->rowCount();
	}
}
