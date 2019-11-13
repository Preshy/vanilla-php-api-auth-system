<?php
$dotenv = Dotenv\Dotenv::create(__DIR__);
$dotenv->load();

class DB {
	protected $conn, $host, $db, $user, $pass;
	public function __construct() {
		$this->host = getenv('DB_HOST');
		$this->user = getenv('DB_USER');
		$this->pass = getenv('DB_PASS');
		$this->db = getenv('DB');

		$this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);
	}
}
?>