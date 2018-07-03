<?php
require_once("header.php"); 
?>

 <?php
       
        ?>
  
   <form  action="../saveWidgetOnPage" method="POST" >
                <div class="modal-body">
                    <p>
                        Add Menu
                    </p>
                    <hr />
 
                    <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                               
                         <label class="col-sm-3 control-label">Select widget<span style="color:#ff0000">*</span></label>
                         <div class="col-sm-9" style="margin-bottom:5px;">
                             <select class="form-control" name="id_widget">
                             <?php
                             foreach ($widget as $p) {
                                        echo '<option value="'.$p->id().'">'.$p->nom().'</option>';
                                    }
                                    ?>
                                
                             </select>
                           </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                            <label class="col-sm-3 control-label" style="margin-bottom:5px;">Order<span style="color:#ff0000">*</span></label>
                                <div class="col-sm-9" style="margin-bottom:5px;">
                                    <input type="text" class="form-control" name="order_id" value="" />
                                </div>
                             
                               <input type="hidden" class="form-control" name="id_page" value="  <?php echo $page_id ?>" />
                               
                            </div>

                           
                        </div>
                        </div>
                      
                    </div>

                       
                      
                    <div class="modal-footer">
                 <!--   <input type="submit" value="Créer ce personnage" class="btn btn-warning" name="form-submitted" />-->
                  <input type="hidden" name="form-submitted" value="1" />
            <input type="submit" class="btn btn-primary" value="SAVE" />
                   
                    </div>
                    

                </div>

            </form>
            <hr>
            <table  class="table table-striped table-hover">
<tr><th>Name</th><Th>File</th><th></th><th></th></tr>
<?php
  foreach ($widgetpage as $m) {
    echo '<tr><td>'.$m->nom().'</td><td>'.$m->file().'</td><td><a href="Add"><span class="glyphicon glyphicon-edit"></span></a></td>
    <td><a href=""  class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span></a></td>';
}

?>

</table>
<?php
require_once("footer.php");
?>