<?php
/**
 * ESERCIZIO 
 * utilizzare la libreria PHP-DI per istanziare la classe USER tramite Dependency Injection Container
 * Suggerimento: 
 * scrivere un file di congurazione perpassare i parametri di connessione al MySQL per laclasse PDO
 * 
 */

 //aki faco o container
//use PDO;
use Psr\Container\ContainerInterface;

return [
    'dsn' => 'mysql: host=localhost; dbname=cloudtags;',
    'username' => 'root',
    'password' => '1234',
    'PDO' => function(ContainerInterface $c) {
    return new PDO($c->get('dsn'), $c->get('username'), $c->get('password'));
}];


//dai chamo o container em outro file, ex no index



