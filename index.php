<?php

require 'vendor/autoload.php'; 

$router = new App\Routers\Router($_GET['url']); 

$router->get('/', "Pages#index"); 
$router->get('/:id', "Pages#show"); 
$router->get('/Admin/addPage', "Admin#viewAddPage"); 
$router->post('/Admin/savePage', "Admin#AddPage"); 
$router->get('/Admin/allPage', "Admin#AllPage"); 
$router->run(); 
?>