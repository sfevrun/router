<?php
namespace App\Controller;
use App\model\MenusManager;
use App\model\Menu;
use PDO;
class PagesController{
    public $model;
    public $db;// = new PDO('mysql:host=localhost;dbname=tests', 'root', '');
      
   
    public function __construct()  
    {  
       // $this->model = new Model();
       $db = new PDO('mysql:host=localhost;dbname=dbnovisal', 'root', '');
       $this->manager = new MenusManager($db); 

    } 
    public function index(){
       // $books = $this->model->getBookList();
      
        $menu = $this->manager->getList();
        $page = $this->manager->getPage('Home');
        $widget = $this->manager->getListWidget();
        include 'views/page.php';
   
    }
    public function show($id){
        $menu = $this->manager->getList();
        $widget = $this->manager->getListWidget();
       $page = $this->manager->getPage($id);
	  include  'views/page.php';
   
    }
}
?>