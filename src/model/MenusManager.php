<?php
namespace App\model;
use App\model\Menu;
use PDO;
class MenusManager
{
  private $_db; // Instance de PDO

  public function __construct($db)
  {
    $this->setDb($db);
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
   // echo $nom;
    if(!$q)
    {
      die("Execute query error, because: ". print_r($this->_db->errorInfo(),true) );
    }
    $donnees = $q->fetch(PDO::FETCH_ASSOC);
   // echo json_encode($donnees);
   // die("Execute query error, because: ". print_r($donnees,true) );
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

     //////////////////////////////////////////
     public function getListWidgetChild($id)
     {
       $mns = [];
   
       $q = $this->_db->query('SELECT * FROM widgets  WHERE id_parent = '.$id);
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