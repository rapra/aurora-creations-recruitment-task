<?php
// Class: Database core connecting to db

//CONFIGURATION
require_once "config/config.php";

class DbCore{
	
	public $pdo;
	private $stmt = null;
	public $error;
	
	// Constructor
	public function __construct(){
		if (!isset($this->pdo)) {
			try {
				$this->pdo = new PDO('mysql:host='.DB_HOST.'; dbname='.DB_NAME, DB_USER, DB_PASS,[
					PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
					PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
					PDO::ATTR_EMULATE_PREPARES => false
					]
				$this->pdo->exec("SET CHARACTER SET utf8");
			} catch (Exception $ex) { exit($ex->getMessage()); }
		}
	}
	//Destructor
	function __destruct () {
		if ($this->stmt !== null) { $this->stmt = null; }
		if ($this->pdo !== null) { $this->pdo = null; }
	}
}



?>