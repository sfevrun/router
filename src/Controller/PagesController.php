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
    $db = new PDO('mysql:host=localhost;dbname=dbnovisal', 'root', '');
    
       $this->manager = new MenusManager($db); 
    } 
    public function index(){
        $menu = $this->manager->getList();
        $page = $this->manager->getPage('Home');
        $widgets = $this->manager->getListWidgetOnPage($page->id());
         $widget = [];
        foreach ($widgets as $w) {
          //  die("Execute query error, because: ". $w->id());
            $child=$this->manager->getListWidgetChild($w->id());
            $w->setChlids($child);
            $widget[] =  $w;
        }
        
     //   $widget = $this->manager->getListWidget();
        include 'views/page.php';
    }
    public function show($id){
       $menu = $this->manager->getList();
        $page = $this->manager->getPage($id);
     $widgets = $this->manager->getListWidgetOnPage($page->id());
     $widget = [];
     foreach ($widgets as $w) {
         $child=$this->manager->getListWidgetChild($w->id());
          $w->setChlids($child);
          $widget[] =  $w;
      }
	  include  'views/page.php';
    }
}
?>