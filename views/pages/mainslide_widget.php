<div class="slider">
					<ul class="slides">

                    <?php 

                        foreach ($widget as $w)
                        {
                        echo '<li data-background="public/dummy/'.$w->image().'.jpg" style=" background-size: cover;">
							<div class="container">
								<div class="slide-caption col-md-4">
									<h2 class="slide-title">'.$w->titre().'</h2>
									<p>'.$w->ptext().'</p>
								</div>
							</div>
						</li>';
                        }

                        ?>

                        
					</ul>
					<div class="flexslider-controls">
						<div class="container">
							<ol class="flex-control-nav">
								<li><a>1</a></li>
								<li><a>2</a></li>
								<li><a>3</a></li>
							</ol>
						</div>
					</div>
				</div>