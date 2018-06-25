<?php
require_once("header.php"); 
?>

 <?php
       
        ?>
  
   <form  action="saveMenu" method="POST" >
                <div class="modal-body">
                    <p>
                        Add Menu
                    </p>
                    <hr />
 
                    <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                               <label class="col-sm-3 control-label">Name<span style="color:#ff0000">*</span></label>
                                <div class="col-sm-9" style="margin-bottom:5px;">
                                    <input type="text" class="form-control" name="nom" value="" required />
                                </div>
                    
                         <label class="col-sm-3 control-label">Page<span style="color:#ff0000">*</span></label>
                         <div class="col-sm-9" style="margin-bottom:5px;">
                             <select class="form-control" name="page">
                             <?php
                             foreach ($page as $p) {
                                        echo '<option value="'.$p->nom().'">'.$p->nom().'</option>';
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
                             
                                <label class="col-sm-3 control-label"></label>
                                <div class="col-sm-9" style="margin-bottom:5px;">
                                <input type="checkbox" name="is_child" />
                                is child
                             </div>
                               
                            </div>

                           
                        </div>
                        </div>
                      
                    </div>

                       
                      
                    <div class="modal-footer">
                 <!--   <input type="submit" value="Créer ce personnage" class="btn btn-warning" name="form-submitted" />-->
                  <input type="hidden" name="form-submitted" value="1" />
            <input type="submit" value="Submit" />
                   
                        <button type="button" ng-click="cancel()" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                    </div>
                    

                </div>

            </form>
            <hr>
            <table  class="table table-striped table-hover">
<tr><th>Name</th><Th>Page</th><th></th><th></th></tr>
<?php
  foreach ($menus as $m) {
    echo '<tr><td>'.$m->nom().'</td><td>'.$m->page().'</td><td><a href="Add"><span class="glyphicon glyphicon-edit"></span></a></td><td><a href=""><span class="glyphicon glyphicon-edit"></span></a></td>';
}

?>

</table>
<?php
require_once("footer.php");
?>