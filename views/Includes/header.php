<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		
		<title>Home Travel</title>
		<!-- Loading third party fonts -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,700" rel="stylesheet" type="text/css">
		<link href="public/fonts/font-awesome.min.css" rel="stylesheet" type="text/css">
		<!-- Loading main css file -->
		<link rel="stylesheet" href="public/css/animate.min.css">
		<link rel="stylesheet" href="public/style.css">
		
		<!--[if lt IE 9]>
		<script src="js/ie-support/html5.js"></script>
		<script src="js/ie-support/respond.js"></script>
		<![endif]-->

	</head>

	<body class="slider-collapse">
		
		<div id="site-content">
			
			<header class="site-header wow fadeInDown">
           
				<div class="container-fluid">
                <div class="row" style="background:#1F3155;height:40px;padding-top:5px;color:#fff">
          <div class="container">
              <div class="col-md-8">
              CONTACT NOVISAL TODAY >> <i class="fa fa-phone"></i> :  (888) 567 2338 <i class="fa fa-envelope"></i> : safety@novisal.com
</div>
          <div class="social-links">
							<a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
							<a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
							<a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
							<a href="#" class="pinterest"><i class="fa fa-pinterest"></i></a>
						</div>
          </div>
                </div>
                <div class="row">
					<div class="header-content">
                    <div class="container">
						<div class="branding">
						<a href="/">	<img src="public/images/logo.jpg" alt="NOVISAL" class="logo"></a>
					
						</div>
						
                        <a class="pull-right" href="https://www.bbb.org/new-jersey/business-reviews/safety-consultants/novisal-llc-in-roselle-nj-90179437#sealclick" target="_blank">	<img src="public/images/BBBSeal.png" style="margin-top:10px;"></a>
						<nav class="main-navigation">
							<button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
							<ul class="menu">
                           <!-- <li class="menu-item"><a href="/"><i class="fa fa-home"></i> HOME</a></li>-->
							<?php 

								foreach ($menu as $m)
								{
									echo '<li class="menu-item"><a href="'.$m->nom().'">'.$m->nom().'</a><li>';
								}

								?>
							</ul>
						</nav>
						
					
					</div>
                    </div>
				</div>
                </div>
			</header> <!-- .site-header -->