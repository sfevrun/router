<?php
namespace App\Controller;
use App\model\AdminManager;
use App\model\Menu;
use App\model\Page;
use App\model\Widget;
use App\model\WidgetPage;
use PDO;
class AdminController{
    public $model;
    public $db;// = new PDO('mysql:host=localhost;dbname=tests', 'root', '');
      
   
    public function __construct()  
    {  
       // $this->model = new Model();
     $db = new PDO('mysql:host=localhost;dbname=dbnovisal', 'root', '');
        // $db = new PDO('mysql:host=localhost;dbname=telemat8_stopeme_db', 'telemat8_stopeme', 'P@ssw0rd');
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
             try {
            $this->manager->addPage( $pa);
          //  $page = $this->manager->getAllPage();
          header( 'Location: allPage' ) ;
            } catch (ValidationException $e) {
                $errors = $e->getErrors();
            }
        }
       
   
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
        $dir = "views/pages/widget/";
            $a = scandir($dir);
            $b = scandir($dir,1);
            $widget = $this->manager->getListWidget();
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
              $pa->setId_parent($_POST['id_parent']);
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
            header( 'Location: addwidget' ) ;
            } catch (ValidationException $e) {
                $errors = $e->getErrors();
            }
        }
  
    }


    public function viewWdgetOnPage($idpage){
        $widget = $this->manager->getListWidget();
        $widgetpage = $this->manager->getListWidgetOnPage($idpage);
        $page_id=$idpage;
          include  'AdminSite/widgetpage.php';
    } 


    public function AddWidgetOnPage(){
        if (isset($_POST['form-submitted'])) { 
            $arr=array();
            $pa=new WidgetPage($arr);
            $pa->setId_page($_POST['id_page']);
            $pa->setId_widget($_POST['id_widget']);
            $pa->setOrder_id(0);
            
           try {
            $this->manager->addWidgetOnPager( $pa);
            $path=
            header( 'Location: WidgetOnPage/'.$pa->id_page());
            } catch (ValidationException $e) {
                $errors = $e->getErrors();
            }
        }
  
    }


}
?>