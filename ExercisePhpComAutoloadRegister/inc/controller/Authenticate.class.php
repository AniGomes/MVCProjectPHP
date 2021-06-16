<?php


interface Authenticate 
{
    public function verify(string $email, string $password) : bool;
}  


?>



