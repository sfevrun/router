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
       $perso = new Menu([
        'nom' => 'Victor',
        'page' => 'Page',
        'target' => 'Taget',
        'is_child' => 1,
        'id_parent' => 0
      ]);
      $this->manager->add($perso);
        $menu = $this->manager->getList();
        include 'views/page.php';
   
    }
    public function show($id){
       // show the requested book
			$book = $this->model->getBook($id);
			include 'views/book.php';
   
    }
}
?>