
 <?php

//anielle.gomes@edu.itspiemonte.it -> pwd: test
//anielle@gmail.com -> pwd: its


 $password= 'its';

 //criptando uma senha com a funcao pwd_hash
 $hash= password_hash($password, PASSWORD_DEFAULT);
 printf("Hash: %s\n", $hash);

// fare copia & incolla do hash qq ve no browser nel file database.sql

if (password_verify($password, $hash)) {
	echo "ok";
}else{
	echo "Erro de autenticacao";
}
