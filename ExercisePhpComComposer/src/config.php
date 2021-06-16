<?php

/**
 * ESERCIZIO u
 * utilizzare la libreria  per istanziare la classe diAutenticazione tramite Dependency Injection ContainerSuggerimento: 
 * scrivere un file di congurazione perpassare i parametri di connessione al MySQL per laclasse PDO
 * 
 */
use PDO;
use Psr\Container\ContainerInterface;

return ['dsn' => 'sqlite:db.sq3',
'PDO' => function(ContainerInterface $c){
    return new PDO($c->get('dsn'));    }];


$builder = new \DI\ContainerBuilder();
$builder->addDefinitions('config.php');
$container = $builder->build();
$cart = $container->get('User');

// return [
//     'view_path' => 'src/View',
//     Environment::class => function(ContainerInterface $c) {
//     	$loader = new FilesystemLoader($c->get('view_path'));
// 		return new Environment($loader);
//     },
//       //conessione db 
//     'dsn' => 'mysql: host=localhost; dbname=cloudtags;',
//     'username' => 'root',
//     'password' => '1234',
//     PDO::class => function(ContainerInterface $c) {
// 		return new PDO($c->get('dsn'), $c->get('username'), $c->get('password'));
//     },
// ];
