<?php

require 'vendor/autoload.php'; 

$router = new App\Routers\Router($_GET['url']); 

$router->get('/', "Pages#index"); 
$router->get('/:id', "Pages#show"); 
$router->get('/Admin/addPage', "Admin#viewAddPage"); 
$router->post('/Admin/savePage', "Admin#AddPage"); 
$router->get('/Admin/allPage', "Admin#AllPage"); 
$router->get('/Admin/addmenu', "Admin#viewAddMenu"); 
$router->post('/Admin/saveMenu', "Admin#AddMenu"); 
$router->get('/Admin/allmenus', "Admin#AllMenu"); 

////////////////////////////////////////////////
$router->get('/Admin/addwidget', "Admin#viewAddWidget"); 
$router->post('/Admin/saveWidget', "Admin#AddWidget"); 
/////////////////////////////////////////////////////////
$router->get('/Admin/WidgetOnPage/:id', "Admin#viewWdgetOnPage"); 
$router->post('/Admin/saveWidgetOnPage', "Admin#AddWidgetOnPage"); 
$router->run(); 
?>