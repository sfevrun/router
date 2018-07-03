<?php

if ($wid->file() == "box4_widget.php") {
echo '<div class="fullwidth-block offers-section">
					<div class="container">
                        <div class="row">';
                        foreach ($wid->chlids() as $w)
                        {
                    echo '<div class="col-md-4 col-sm-6 col-xs-12">
								<article class="offer wow bounceIn" data-wow-delay=".2s">
                                    <figure class="featured-image">
                                    <img src="views/wImage/'.$w->image().'" alt="">
                                    </figure>
									<p>'.$w->ptext().'</p>
									<a href="#" class="button">See details</a>
								</article>
                            </div>';
                        }
						
						
						echo '</div>
					</div>
				</div>';
}
?>
