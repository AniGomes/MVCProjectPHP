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
	
	public $pdo;
	
	//na dependency injection vc tem q usar pdo no construtor
	//per construir o objeto da claasse user vc precisa passar um objeto do tipo PDO
	//public function __construct()
	public function __construct(PDO $pdo)

	{
		//usando variavel db podemos acessar o database instanciando classe Connection
		// $this->db = new Connection();
		// //chama o metodo conectar da classe Conection
		// $this->db = $this->db->conectar();
		$this->pdo = $pdo;
		
	}

	//essa funcao so aceita do database password criptografada com hash, fazer insert c a pwd criptada ou atraves funcao register

	//TROCAR TUDO POR $this->pdo
	public function verify(string $email, string $password) : bool{


		$sth = $this->pdo->prepare('SELECT password FROM users WHERE email = :email');
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




	


	

	


}


?>