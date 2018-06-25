<?php 
  
	require_once("Includes/header.php"); 
	echo '<main class="content">';
	require_once("pages/".$page->file()); 
	echo '</main>';
	require_once("Includes/footer.php"); 
?>
