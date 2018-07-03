
	<?php 
 			?>
			  	<div class="fullwidth-block features-section" style="padding-top:180px;padding-bottom:0px;background: url(public/dummy/texture.jpg)">
					<div class="container">
					
                       <?php 
						echo '<h1>'. $page->titre(). '</h1>'
						?>
				
                </div>
               </div>
            	<div class="fullwidth-block features-section">
					<div class="container">
					<div class="col-md-8">
                      <?php 
						echo $page->ptext();
						?>
						</div>
						<div class="col-md-4">
							<?php
						foreach ($widgets as $wid)
							{
								require_once("widget/".$wid->file()); 
							} 
						?>
						</div>
			
                </div>