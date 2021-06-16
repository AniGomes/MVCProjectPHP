<?php
use SimpleMVC\Controller;

return [
    [ 'GET', '/', Controller\Home::class ],

    [ 'POST', '/', Controller\Home::class ],

    [ 'GET', '/login', Controller\Login::class ],

    [ 'POST', '/login', Controller\Login::class ],

    [ 'GET', '/upload', Controller\Upload::class], 

    [ 'POST', '/upload', Controller\Upload::class], 
   
];
