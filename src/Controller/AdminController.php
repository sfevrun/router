<?php
namespace App\Controller;
use App\model\AdminManager;
use App\model\Menu;
use App\model\Page;
use App\model\Widget;
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
          //  $page = $this->manager->getAllPage();
          header( 'Location: allPage' ) ;
            } catch (ValidationException $e) {
                $errors = $e->getErrors();
            }
        }
        //$this->redirect('anotherControllerName/myCustomAction');
      //  $this->redirect('AllPage');
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
            header( 'Location: addmenu' ) ;
         //   $page = $this->manager->getAllPage();
            } catch (ValidationException $e) {
                $errors = $e->getErrors();
            }
        }
     
       
    }
    public function AllMenus(){
         try {
               $page = $this->manager->getAllPage();
            } catch (ValidationException $e) {
                $errors = $e->getErrors();
            }
      	  include  'AdminSite/allmenus.php';
   
    }

    public function viewAddWidget(){
        $dir = "views/pages/";
            $a = scandir($dir);
            $b = scandir($dir,1);

          // die($b);
          include  'AdminSite/addwidget.php';
    } 
    public function AddWidget(){
        if (isset($_POST['form-submitted'])) { 
            $arr=array();
            $filename = $_FILES['image']['name'];
            $pa=new Widget($arr);
            $pa->setNom($_POST['nom']);
            $pa->setTitre($_POST['titre']);
            $pa->setPtext($_POST['ptext']);
            $pa->setPtext1($_POST['ptext1']);
            $pa->setImage($filename);
            $pa->setImage1($filename);
          //  $pa->setImage2($_POST['nom']);
            $pa->setFile($_POST['wfile']);
            $pa->setOrder_id(0);
              // $name     = $_FILES['image1']['name'];
           // $tmpName  = $_FILES['image1']['tmp_name'];
           // $error    = $_FILES['image1']['error'];
           // $size     = $_FILES['image1']['size'];
          
          //  $ext      = strtolower(pathinfo($name, PATHINFO_EXTENSION));
         
             $destination = 'views/wImage/'. $filename;
      
           try {
            $this->manager->addWidget( $pa);
            move_uploaded_file( $_FILES['image']['tmp_name'] , $destination );
            header( 'Location: allpage' ) ;
            } catch (ValidationException $e) {
                $errors = $e->getErrors();
            }
        }
  
    }

}
?>