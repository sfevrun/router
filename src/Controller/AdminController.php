<?php
namespace App\Controller;
use App\model\AdminManager;
use App\model\Menu;
use App\model\Page;
use PDO;
class AdminController{
    public $model;
    public $db;// = new PDO('mysql:host=localhost;dbname=tests', 'root', '');
      
   
    public function __construct()  
    {  
       // $this->model = new Model();
       $db = new PDO('mysql:host=localhost;dbname=dbnovisal', 'root', '');
       $this->manager = new AdminManager($db); 

    } 
    public function index(){
       // $books = $this->model->getBookList();
      $menu = $this->manager->getList();
        $page = $this->manager->getPage('Home');
        $widget = $this->manager->getListWidget();
        include 'views/page.php';
   
    }
    public function viewAddPage(){
        $dir = "views/pages/";
            $a = scandir($dir);
            $b = scandir($dir,1);

          // die($b);
          include  'AdminSite/addpage.php';
    } 
    public function AddPage(){
        if (isset($_POST['form-submitted'])) { 
            $arr=array();;
            $pa=new Page($arr);
            $pa->setNom($_POST['nom']);
            $pa->setTitre($_POST['titre']);
            $pa->setPtext($_POST['ptext']);
            $pa->setFile($_POST['file']);
         $pa->setIs_home(0);
         $pa->setOrder_id(0);
       //  (:nom, :titre, :ptext, :ptext1, :is_home,order_id)
        //    $method = 'set'.ucfirst($key);
          //  $nom       = isset($_POST['nom']) ?   $_POST['nom']  :NULL;
           // $titre      = isset($_POST['titre'])?   $_POST['titre'] :NULL;
          //  $file      = isset($_POST['file'])?   $_POST['file'] :NULL;
           try {
            $this->manager->addPage( $pa);
            $page = $this->manager->getAllPage();
            } catch (ValidationException $e) {
                $errors = $e->getErrors();
            }
        }
        //$this->redirect('anotherControllerName/myCustomAction');
        $this->redirect('AllPage');
     //   redirect('/Admin/allPage'); 
     //   $page = $this->manager->addPage($page);
	 // include  'AdminSite/listepages.php';
   
    }
    public function AllPage(){
         try {
               $page = $this->manager->getAllPage();
            } catch (ValidationException $e) {
                $errors = $e->getErrors();
            }
      	  include  'AdminSite/listepages.php';
   
    }
   
    public function viewAddMenu(){
        $menus=$this->manager->getList();
        $page = $this->manager->getAllPage();
          include  'AdminSite/addmenu.php';
    } 
    public function AddMenu(){
        if (isset($_POST['form-submitted'])) { 
            $arr=array();;
            $pa=new Menu($arr);
            $pa->setNom($_POST['nom']);
            $pa->setPage($_POST['page']);
            $pa->setTarget('');
            $pa->setIs_child(0);

            $pa->setId_parent(0);
            $pa->setOrder_id(0);
            try {
            $this->manager->add( $pa);
         //   $page = $this->manager->getAllPage();
            } catch (ValidationException $e) {
                $errors = $e->getErrors();
            }
        }
        redirect('/Admin/allmenus'); 
     
    }
    public function AllMenus(){
         try {
               $page = $this->manager->getAllPage();
            } catch (ValidationException $e) {
                $errors = $e->getErrors();
            }
      	  include  'AdminSite/allmenus.php';
   
    }
}
?>