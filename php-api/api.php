<?php

$con= mysqli_connect("localhost","root",1234,"api_push");
if ($con) {
    echo "db conectado";
    $sql= "select * from customers";
}
else{
    echo "falied connection db";
}

?>