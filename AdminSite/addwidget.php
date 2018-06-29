<?php
require_once("header.php"); 
?>
<script>
tinymce.init({
  selector: 'textarea',
  height: 100,
  theme: 'modern',
  plugins: 'print preview fullpage powerpaste searchreplace autolink directionality advcode visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount tinymcespellchecker a11ychecker imagetools mediaembed  linkchecker contextmenu colorpicker textpattern help',
  toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
  image_advtab: true,
  templates: [
    { title: 'Test template 1', content: 'Test 1' },
    { title: 'Test template 2', content: 'Test 2' }
  ],
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css'
  ]
 });

</script>
 <?php
       
        ?>
  
   <form  action="saveWidget" method="POST"  enctype="multipart/form-data">
                <div class="modal-body">
                    <p>
                        Add Page
                    </p>
                    <hr />
 
                    <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-6">
                               <label class="col-sm-2 control-label">Name<span style="color:#ff0000">*</span></label>
                                <div class="col-sm-10" style="margin-bottom:5px;">
                                    <input type="text" class="form-control" name="nom" value="" required />
                                </div>
                                </div>
                                <div class="col-md-6">
                                <label class="col-sm-2 control-label" style="margin-bottom:5px;">Title<span style="color:#ff0000">*</span></label>
                                <div class="col-sm-10" style="margin-bottom:5px;">
                                    <input type="text" class="form-control" name="titre" value="" />
                                </div>
                                </div>
                    
                         <label class="col-sm-3 control-label">File</label>
                         <div class="col-sm-9" style="margin-bottom:5px;">
                             <select class="form-control" name="wfile">
                             <?php
                             foreach ($b as $value) {
                                        echo '<option value="'.$value.'">'.$value.'</option>';
                                    }
                                    ?>
                                
                             </select>
                           </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                           
                    
                                <label class="col-sm-3 control-label">Image 1</label>
                                <div class="col-sm-9" style="margin-bottom:5px;">
                                <input type="file" name="image" />
                                  </div>
                        
                             <label class="col-sm-3 control-label">Image 2</label>
                                <div class="col-sm-9" style="margin-bottom:5px;">
                                <input type="file" name="image1" />
                                  </div>
                         

                               
                            </div>

                           
                        </div>
                        </div>
                        <div class="row">
<hr/>
<div class="col-md-6">
                         <label class="col-sm-3 control-label" style="margin-bottom:5px;">Text one<span style="color:#ff0000">*</span></label>
                                <div class="col-sm-12" style="margin-bottom:5px;">
                                <textarea  class=" form-control" name="ptext"></textarea>
                                   
                                </div>
                                </div>
                                <div class="col-md-6">
                                <label class="col-sm-3 control-label" style="margin-bottom:5px;">Text two<span style="color:#ff0000">*</span></label>
                                <div class="col-sm-12" style="margin-bottom:5px;">
                                <textarea  class=" form-control" name="ptext1"></textarea>
                                   
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
<?php
require_once("footer.php");
?>