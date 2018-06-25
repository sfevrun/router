<?php
namespace App\model;

class Page
{
  private $_id;
  private $_nom;
  private $_titre;
  private $_ptext;
  private $_ptext1;
  private $_is_home;
  private $_file;
  private $_order_id;
  
  public function __construct(array $donnees)
  {
    $this->hydrate($donnees);
  }
  public function hydrate(array $donnees)
  {
  foreach ($donnees as $key => $value)
	{
	  $method = 'set'.ucfirst($key);
	  if (method_exists($this, $method))
	  {
       $this->$method($value);
 	  }
	}
  }
  public function id() { return $this->_id; }
  public function nom() { return $this->_nom; }
  public function titre() { return $this->_titre; }
  public function ptext() { return $this->_ptext; }
  public function ptext1() { return $this->_ptext1; }
  public function is_home() { return $this->_is_home; }
  public function file() { return $this->_file; }
  public function order_id() { return $this->_order_id; }
  public function setId($id)
  {
    $this->_id = (int) $id;
  }     
  public function setNom($nom)
  {
     $this->_nom = $nom;
 
  }
  public function setTitre($titre)
  {
        $this->_titre = $titre;
  }
  public function setPtext($ptext)
  {
     $this->_ptext = $ptext;
    }
  public function setPtext1($ptext1)
  {
     $this->_ptext1 = $ptext1;
  }

  public function setIs_home($is_home)
  {
    $this->_is_home = $is_home;
   }
   public function setFile($file)
   {
      $this->_file = $file;
   }
 
   public function setOrder_id($order_id)
  {
    $this->_order_id= (int) $order_id;
  }
}
?>