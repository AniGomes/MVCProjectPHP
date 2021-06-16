<?php 
//session_start();

namespace App;
use PDO;
use PDOException;

/**
 * 
 */
class User implements Authenticate
{
	
	private $db;
	
	public function __construct()

	{
		//usando variavel db podemos acessar o database instanciando classe Connection
		$this->db = new Connection();
		//chama o metodo conectar da classe Conection
		$this->db = $this->db->conectar();
		
	}

	//essa funcao so aceita do database password criptografada com hash, fazer insert c a pwd criptada ou atraves funcao register

	public function verify(string $email, string $password) : bool{


		$sth = $this->db->prepare('SELECT password FROM users WHERE email = :email');
        $sth->bindParam(':email', $email);

        if (false === $sth->execute()) {
            return false;
        }

        $result = $sth->fetch(PDO::FETCH_ASSOC);

        if (false === $result || empty($result)) {
            return false;
        }
        return password_verify($password, $result['password']);
				
	}




	public function select2($query, $params)
	{
		
		$stmt = $this->db->prepare($query);

		$stmt->execute(isset($params) ? $params:null);

		if ($stmt->rowCount()>0) {
			return $stmt->fetchAll();

		}else{
			return [];//p n da erro se eu pedir p retornar um id q n existe na tabela users
		}
		

		return $stmt->fetchAll(\PDO::FETCH_ASSOC);

	}



	private function setParams($statement, $parameters = array())
	{

		foreach ($parameters as $key => $value) {
			
			$this->bindParam($statement, $key, $value);

		}

	}

	private function bindParam($statement, $key, $value)
	{

		$statement->bindParam($key, $value);

	}


	//essa funcao usa as funcoes de cima
	public function select($rawQuery, $params = array()):array
	{
		
		$stmt = $this->db->prepare($rawQuery);

		$this->setParams($stmt, $params);

		$stmt->execute();

		return $stmt->fetchAll(\PDO::FETCH_ASSOC);

	}

	


}


?>