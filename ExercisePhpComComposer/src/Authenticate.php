<?php


namespace App;

interface Authenticate 
{
    public function verify(string $email, string $password) : bool;
}  


?>



