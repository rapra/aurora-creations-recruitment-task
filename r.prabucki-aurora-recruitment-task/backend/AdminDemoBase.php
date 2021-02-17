<?php declare(strict_types=1);

class AdminDemoBase{	
	
	//Variables
	protected $pdo = null;
	private $stmt = null;
	public $error = null;

	// Constructor
	public function __construct(){
		
		if (!isset($this->pdo)) {
			try {
				$this->pdo = new PDO('mysql:host='.DB_HOST.'; dbname='.DB_NAME, DB_USER, DB_PASS,[
					PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
					PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
					PDO::ATTR_EMULATE_PREPARES => false
					]
				);	
				$this->pdo->exec("SET CHARACTER SET " .  DB_CHARSET);
			} catch (Exception $ex) { exit($ex->getMessage()); }
		}
	}
	
	//Destructor
	function __destruct () {
		if ($this->stmt !== null) { $this->stmt = null; }
		if ($this->pdo !== null) { $this->pdo = null; }
	}
	
	function dbRequest (string $request, $params = null) {
		try {
		//var_dump($params);
		$this->stmt = $this->pdo->prepare($request);		
		$params != null ? (
				is_int($params) ? 
				$this->stmt->execute([$params]) 
				: $this->stmt->execute($params)
			)
			: $this->stmt->execute();
		$preparedData = new \stdClass();
		$affectedRows = $this->stmt->rowCount();
		$affectedRows > 0 ? $preparedData->affectedRows = $affectedRows : null;
		$insertId = (int) $this->pdo->lastInsertId();
		$insertId > 0 ? $preparedData->insertId = $insertId : null;
		$entry = $params != null ?	$this->stmt->fetchAll() : $this->stmt->fetchAll(PDO::FETCH_UNIQUE);
		return count($entry)==0 ? ($count ? $count : $preparedData ? $preparedData : false) : ($params != null ? $entry[0] : $entry);
		} catch (Exception $ex) {
			$this->error = $ex->getMessage();
			return false;
		}
		
	}
	function array_except($array, $keys) {
		return array_diff_key($array, array_flip((array) $keys));   
	} 

}

?>