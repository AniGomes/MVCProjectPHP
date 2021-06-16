<?php
//classe p definir configuracao de conexao banco de dados

// define("db_host","127.0.0.1"); //localhost
// define("db_user","root"); //usuario
// define("db_pass","1234"); //pwd
// define("db_name","cloudtags"); //nome database
 ?>

 <?php 

/**
 * 
 */
// class Connection
// {
// 	//crio as propriedades como no file settingsDB
// 	private $host = db_host;
// 	private $user = db_user;
// 	private $pass = db_pass;
// 	private $db = db_name;

// 	//variavel responsavel por distribuir a conexao coloco nela a classe PDO abaixo
// 	private $pdo;

// 	function __construct()
// 	{
// 		//toda vez q iniciar esse script o construtor vai inicializar o pdo pra mim
// 		try {
// 			//como n passei no parenteses o pdo meto this aki
// 			$this->pdo = new PDO("mysql:host=$this->host;dbname=$this->db",$this->user, $this->pass);
// 			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// 		} catch (PDOException $e) {
// 			exit("Errore di connessione: ".$e->getMessage());
			
// 		}
// 	}


// 	//funcao insert ondee passo a query e os parametros
// 	public function insert($query, $params)
// 	{

// 		$stmt = $this->pdo->prepare($query);//essa query que vamos passar la no index
// 		//se existir parametros seta o valor deles senao seta valor null
// 		$stmt->execute(isset($params) ? $params:null);
// 		return $stmt->rowCount();
// 	}



// 	// public function select($query, $params)
// 	// {

// 	// 	$stmt = $this->pdo->prepare($query);//


// 	// 	//$stmt->execute(isset($params) ? $params:null);
		
// 	// 	$stmt->execute(isset($params) ? $params:null);

// 	// 	return $stmt->rowCount();


// 	// }
// 	private function setParams($statement, $parameters = array())
// 	{

// 		foreach ($parameters as $key => $value) {
			
// 			$this->bindParam($statement, $key, $value);

// 		}

// 	}

// 	private function bindParam($statement, $key, $value)
// 	{

// 		$statement->bindParam($key, $value);

// 	}


// 	//essa funcao usa as funcoes de cima
// 	public function select($rawQuery, $params = array()):array
// 	{

// 		$stmt = $this->pdo->prepare($rawQuery);

// 		$this->setParams($stmt, $params);

// 		$stmt->execute();

// 		return $stmt->fetchAll(\PDO::FETCH_ASSOC);

// 	}

// 	public function select2($query, $params)
// 	{

// 		$stmt = $this->pdo->prepare($query);

// 		$stmt->execute(isset($params) ? $params:null);

// 		if ($stmt->rowCount()>0) {
// 			return $stmt->fetchAll();

// 		}else{
// 			return [];//p n da erro se eu pedir p retornar um id q n existe na tabela users
// 		}
		

// 		return $stmt->fetchAll(\PDO::FETCH_ASSOC);

// 	}

// 	public function update($query, $params){

// 		try {
// 			$stmt = $this->pdo->prepare($query);

// 		$stmt->execute(isset($params) ? $params:null);
// 		} catch (Exception $e) {
// 			echo $e->getMessage();
// 		}
// 	}


// 	public function login($email, $password)
// 	{

// 		$stmt = $this->pdo->prepare($email);

// 		$stmt->execute(isset($password) ? $password:null);

// 		if ($stmt->rowCount()>0) {
// 			return $stmt->fetchAll();

// 		}else{
// 			return [];//p n da erro se eu pedir p retornar um id q n existe na tabela users
// 		}
		

// 	}
// }


?>