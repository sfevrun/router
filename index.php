<?php

require 'vendor/autoload.php'; 

$router = new App\Routers\Router($_GET['url']); 
//$router->get('/', function(){ echo "Bienvenue sur ma homepage !"; }); 
$router->get('/posts/:id', function($id){ echo "Voila l'article $id"; }); 
$router->get('/', "Pages#index"); 
$router->get('/:id', "Pages#show"); 
$router->run(); 
?>