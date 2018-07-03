<?php
require_once("header.php"); 
?>
<hr>
<a href="addPage" class="btn btn-primary pull-right" ><span class="glyphicon glyphicon-add"></span> Add New Page</a>

<table  class="table table-striped table-hover">
<tr><th>Name</th><Th>Title</th><th></th><th></th></tr>
<?php
  foreach ($page as $p) {
    echo '<tr><td>'.$p->nom().'</td><td>'.$p->titre().'</td><td><a href="WidgetOnPage/'.$p->id().'"><span class="glyphicon glyphicon-edit"></span></a></td><td><a href=""><span class="glyphicon glyphicon-edit"></span></a></td>';
}

?>

</table>
