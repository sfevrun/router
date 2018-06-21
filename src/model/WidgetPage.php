<?php
namespace App\model;

class Widget
{
  private $_id;
  private $_id_page;
  private $_id_widget;
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
  public function id_page() { return $this->_id_page; }
  public function id_widget() { return $this->_id_widget; }
  public function order_id() { return $this->_order_id; }

  public function setId($id)
  {
    $this->_id = (int) $id;
  }     
  public function setId_page($id_page)
  {
     $this->_id_page = $id_page;
 
  }
  public function setId_widget($id_widget)
  {
     $this->_id_widget = $id_widget;
 
  }
  
   public function setOrder_id($order_id)
  {
    $this->_order_id= (int) $order_id;
  }
}
?>