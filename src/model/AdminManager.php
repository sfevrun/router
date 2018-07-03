<?php
namespace App\model;
use App\model\Menu;
use PDO;
class AdminManager
{
  private $_db; // Instance de PDO

  public function __construct($db)
  {
    $this->setDb($db);
  }
  public function addPage(Page $page)
  {
    $q = $this->_db->prepare('INSERT INTO pages(nom, titre, ptext, file, is_home,order_id) VALUES(:nom, :titre, :ptext, :file, :is_home,:order_id)');

    $q->bindValue(':nom', $page->nom());
    $q->bindValue(':titre', $page->titre());
    $q->bindValue(':ptext', $page->ptext());
    $q->bindValue(':file', $page->file());
    $q->bindValue(':is_home', $page->is_home());
    $q->bindValue(':order_id', $page->order_id(), PDO::PARAM_INT);
    $q->execute();
  }
 
  public function addWidgetOnPager(WidgetPage $page)
  {
    $q = $this->_db->prepare('INSERT INTO widgetpage(id_page, id_widget, order_id) VALUES(:id_page, :id_widget,:order_id)');

    $q->bindValue(':id_page', $page->id_page());
    $q->bindValue(':id_widget', $page->id_widget());
    $q->bindValue(':order_id', $page->order_id(), PDO::PARAM_INT);
    $q->execute();
  }
  public function addWidget(Widget $page)
  {
    $q = $this->_db->prepare('INSERT INTO widgets(nom, titre, ptext,ptext1,id_parent,image,image1,image2, file, order_id) VALUES(:nom, :titre, :ptext, :ptext1,:id_parent,:image,:image1,:image2, :file, :order_id)');

    $q->bindValue(':nom', $page->nom());
    $q->bindValue(':titre', $page->titre());
    $q->bindValue(':ptext', $page->ptext());
    $q->bindValue(':ptext1', $page->ptext1());
    $q->bindValue(':id_parent', $page->id_parent());
     $q->bindValue(':image', $page->image());
    $q->bindValue(':image1', $page->image1());
    $q->bindValue(':image2', $page->image2());
    $q->bindValue(':file', $page->file());
     $q->bindValue(':order_id', $page->order_id(), PDO::PARAM_INT);
    $q->execute();
  }

  public function add(Menu $mn)
  {
    $q = $this->_db->prepare('INSERT INTO Menus(nom, page, target, is_child, id_parent) VALUES(:nom, :page, :target, :is_child, :id_parent)');

    $q->bindValue(':nom', $mn->nom());
    $q->bindValue(':page', $mn->page(), PDO::PARAM_INT);
    $q->bindValue(':target', $mn->target(), PDO::PARAM_INT);
    $q->bindValue(':is_child', $mn->is_child(), PDO::PARAM_INT);
    $q->bindValue(':id_parent', $mn->id_parent(), PDO::PARAM_INT);

    $q->execute();
  }

  public function delete(Menu $mn)
  {
    $this->_db->exec('DELETE FROM Menus WHERE id = '.$mn->id());
  }

  public function get($id)
  {
    $id = (int) $id;

    $q = $this->_db->query('SELECT id, nom, page, target, is_child, id_parent FROM menus WHERE id = '.$id);
    $donnees = $q->fetch(PDO::FETCH_ASSOC);

    return new Menu($donnees);
  }
  public function getPage($nom)
  {
  
    $q = $this->_db->query('SELECT * FROM pages WHERE nom ="'.$nom.'"');
    if(!$q)
    {
      die("Execute query error, because: ". print_r($this->_db->errorInfo(),true) );
    }
    $donnees = $q->fetch(PDO::FETCH_ASSOC);
 
    return new Page($donnees);
  }
  public function getListWidget()
  {
    $mns = [];

    $q = $this->_db->query('SELECT * FROM widgets ORDER BY id');
    if(!$q)
    {
      die("Execute query error, because: ". print_r($this->_db->errorInfo(),true) );
    }
    //success case
    else{
    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
     $m=new Widget($donnees);
 
      $mns[] =  $m;
     
    }
     return $mns;
  }
  }
  //////////////////////////////////////////
  public function getListWidgetOnPage($id)
  {
    $mns = [];

    $q = $this->_db->query('SELECT w.* FROM widgets w JOIN widgetpage p on w.id=p.id_widget WHERE id_page = '.$id);
    if(!$q)
    {
      die("Execute query error, because: ". print_r($this->_db->errorInfo(),true) );
    }
    //success case
    else{
    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
     $m=new Widget($donnees);
 
      $mns[] =  $m;
     
    }
     return $mns;
  }
  }
  public function getAllPage()
  {
    $mns = [];

    $q = $this->_db->query('SELECT * FROM pages ORDER BY id');
    if(!$q)
    {
      die("Execute query error, because: ". print_r($this->_db->errorInfo(),true) );
    }
    //success case
    else{
    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
     $m=new Page($donnees);
 
      $mns[] =  $m;
     
    }
     return $mns;
  }
  }

  public function getList()
  {
    $mns = [];

    $q = $this->_db->query('SELECT * FROM menus ORDER BY id');
    if(!$q)
    {
      die("Execute query error, because: ". print_r($this->_db->errorInfo(),true) );
    }
    //success case
    else{
    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
     $m=new Menu($donnees);
 
      $mns[] =  $m;
     
    }
     return $mns;
  }
  }

  public function update(Menu $mn)
  {
    $q = $this->_db->prepare('UPDATE Menus SET page = :page, target = :target, is_child = :is_child, id_parent = :id_parent WHERE id = :id');

    $q->bindValue(':page', $mn->page(), PDO::PARAM_INT);
    $q->bindValue(':target', $mn->target(), PDO::PARAM_INT);
    $q->bindValue(':is_child', $mn->is_child(), PDO::PARAM_INT);
    $q->bindValue(':id_parent', $mn->id_parent(), PDO::PARAM_INT);
    $q->bindValue(':id', $mn->id(), PDO::PARAM_INT);

    $q->execute();
  }

  public function setDb(PDO $db)
  {
    $this->_db = $db;
  }
}
?>