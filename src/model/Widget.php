<?php
namespace App\model;

class Widget
{
  private $_id;
  private $_nom;
  private $_titre;
  private $_ptext;
  private $_ptext1;
  private $_id_parent;
  private $_image;
  private $_image1;
  private $_image2;
  private $_file;
  private $_order_id;
  private $_chlids;

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
  public function id_parent() { return $this->_id_parent; }
  public function image() { return $this->_image; }
  public function image1() { return $this->_image1; }
  public function image2() { return $this->_image2; }
  public function file() { return $this->_file; }
  public function order_id() { return $this->_order_id; }
  public function chlids() { return $this->_chlids; }
  
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

  public function setId_parent($id_parent)
  {
   
      $this->_id_parent = (int)$id_parent;
   
  }
  public function setImage($image)
  {
   
      $this->_image = $image;
   
  }
  public function setImage1($image1)
  {
   
      $this->_image1 =$image1;
   
  }
  public function setImage2($image2)
  {
   
      $this->_image2 = $image2;
   
  }
  public function setFile($file)
  {
     $this->_file = $file;
  }
   public function setOrder_id($order_id)
  {
    $this->_order_id= (int) $order_id;
  }

    public function setChlids($chlids)
  {
    $this->_chlids= $chlids;
  } 
}
?>