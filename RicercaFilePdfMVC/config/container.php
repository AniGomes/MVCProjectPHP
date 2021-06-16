<?php
use League\Plates\Engine; 
use Psr\Container\ContainerInterface;//gestire dipendency injection

return [
    'view_path' => 'src/View',
    Engine::class => function(ContainerInterface $c) {
        return new Engine($c->get('view_path'));
    },
'dsn' => 'mysql: host=localhost; dbname=api;',
'username' => 'root',
'password' => '1234',
PDO::class => function(ContainerInterface $c) {
    return new PDO($c->get('dsn'), $c->get('username'), $c->get('password'));
    },
];

