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

  public function setId($id)
  {
    // L'identifiant du personnage sera, quoi qu'il arrive, un nombre entier.
    $this->_id = (int) $id;
  }
        
  public function setNom($nom)
  {
    // On vérifie qu'il s'agit bien d'une chaîne de caractères.
    // Dont la longueur est inférieure à 30 caractères.
    if (is_string($nom) && strlen($nom) <= 30)
    {
      $this->_nom = $nom;
    }
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

  public function setId_parent($exp)
  {
    $exp = (int) $exp;

    // On vérifie que l'expérience est comprise entre 0 et 100.
    if ($exp >= 0 && $exp <= 100)
    {
      $this->_id_parent = $exp;
    }
  }
}
?>