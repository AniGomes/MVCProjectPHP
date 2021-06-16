<?php

//busca as classes atraves dos use
use App\User;


//carrega automatic todas as classes
require __DIR__ . "/vendor/autoload.php";


//var_dump($user);

//validacaoa login reebe dados do form
if (isset($_POST['btnLogar'])) {
  
  //cria o oobjeto da classe User
  $user = new User();

 //memorizzo post em variaveis locais
 $email = $_POST['email'];
 $password = $_POST['password'];

  //usa o objeto p chamar os metodos e eseguo metodo verifica utente e pwd
  if($user->verify($email, $password) == true)
  {
    header('location:home.php');
   printf("Benvenuto %s!", $email); 
      exit(1);
  }else{
   printf("Errore di autenticazione");
   exit(1);//mostra a msg de erro em outra pagina pq deu exit
  }

}



//fMETODO INSERT ja com a senha q criptei no file password.php
// $stmt= $con->insert("INSERT INTO users (email, password) VALUES (:email, :password)",
// [
// 	'email' => 'anielle@gmail.com',
// 	'password' => '$2y$10$mLxg0XSg65WOJ9UE.wBRMe4lt.HMHX96GqT5M89bFnDQafwOCgvry'


// ]);

//inclui pk no db senao da erro

// if ($tmt > 0) {
// 	echo "ok inserir";
// }else{
// 	echo "erro inserir";
// }


//SELECT outro tipo
// $st = $user2->select2("SELECT * FROM users WHERE email = 'lucas@gmail.com'", null);

// foreach ($st as $key => $value) {
// 	 echo "{$key} => {$value} ";
// 	 echo "<pre>";
//      print_r($st);
//      echo "</pre>";
// }

//METODO SELECT
// $user2 = new User();
// $stmt = $user2->select("SELECT * FROM users");

// //echo json_encode($results);
// echo '<pre>';
// print_r($stmt); //para ver arrays se usa printr ou faz 1 fo
// echo '</pre>';



?>

   <!DOCTYPE html>
   <html>
   <head>
       <title>Login</title>
        
   </head>
   <body>

    <div id="overlay"></div>
    <div class="loginbox">
        <h1>Login</h1><br><br>

       <!--action vazia pq envia dados p mesma pagina-->
        <form name="login" action="index.php" method="post" >

            <input name="email" type="email" placeholder="Email" required="required"><br>
            <input name="password" type="password" placeholder="Password" required="required">
            <input name="btnLogar" type="submit" value="INVIA">
        
        </form>
      
        
    </div>

     </body>
   </html>



