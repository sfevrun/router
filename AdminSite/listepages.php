<?php
require_once("header.php"); 
?>
<table  class="table table-striped table-hover">
<tr><th>Name</th><Th>Title</th><th></th><th></th></tr>
<?php
  foreach ($page as $p) {
    echo '<tr><td>'.$p->nom().'</td><td>'.$p->titre().'</td><td><a href="Add"><span class="glyphicon glyphicon-edit"></span></a></td><td><a href=""><span class="glyphicon glyphicon-edit"></span></a></td>';
}

?>

</table>
