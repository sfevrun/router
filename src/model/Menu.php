<?php
namespace App\model;

class Menu
{
  private $_id;
  private $_nom;
  private $_page;
  private $_target;
  private $_is_child;
  private $_id_parent;
  private $_order_id;

  public function __construct(array $donnees)
  {
    $this->hydrate($donnees);
  }
  // Un tableau de données doit être passé à la fonction (d'où le préfixe « array »).
  public function hydrate(array $donnees)
  {
   
   
	foreach ($donnees as $key => $value)
	{
	  // On récupère le nom du setter correspondant à l'attribut.
	  $method = 'set'.ucfirst($key);
		  
	  // Si le setter correspondant existe.
	  if (method_exists($this, $method))
	  {
		// On appelle le setter.
       $this->$method($value);
     
	  }
	}
  }

  public function id() { return $this->_id; }
  public function nom() { return $this->_nom; }
  public function page() { return $this->_page; }
  public function target() { return $this->_target; }
  public function is_child() { return $this->_is_child; }
  public function id_parent() { return $this->_id_parent; }
  public function order_id() { return $this->_order_id; }
  public function setId($id)
  {
    // L'identifiant.
    $this->_id = (int) $id;
  }
        
  public function setNom($nom)
  {
         $this->_nom = $nom;
  
  }

  public function setPage($page)
  {
  
      $this->_page = $page;
   
  }

  public function setTarget($target)
  {
     $this->_target = $target;
    }

  public function setIs_child($is_child)
  {
     $this->_is_child = $is_child;
   
  }

  public function setId_parent($id_parent)
  {
   
      $this->_id_parent = (int)$id_parent;
   
  }

   public function setOrder_id($exp)
  {
    $this->_order_id= (int) $order_id;
  }
}
?>