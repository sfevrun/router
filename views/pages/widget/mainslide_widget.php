
<?php

if ($wid->file() == "mainslide_widget.php") {
    
	echo '<div class="slider">

					<ul class="slides">';

               
                     
                        foreach ($wid->chlids() as $w)
                        {

                        echo '<li data-background="views/wImage/'.$w->image().'" style=" background-size: cover;">
							<div class="container">
								<div class="slide-caption col-md-4">
									<h2 class="slide-title">'.$w->titre().'</h2>
									<p>'.$w->ptext().'</p>
								</div>
							</div>
						</li>';
					
                        }
					
                      

                        
				echo '</ul>
					<div class="flexslider-controls">
						<div class="container">
							<ol class="flex-control-nav">';
							foreach ($wid->chlids() as $w)
							{
							echo '<li><a></a></li>';
								
							}
							echo '	</ol>
						</div>
					</div>
				</div>';

			}
			?>