<?php
require('./lang/langue.php');
require('../class/Autoloader.php');
Autoloader::register();
$configSession = new ConfigSession;
$db= new MyDB;
$tpl=new Template;
$page="home";


//$rm=$tpl->getSubItems(4,2,21);
//
//foreach($rm as $valeur){
//	echo $valeur->nom_item_menu;
//	var_dump($valeur);
//}
//exit();
?>
<!DOCTYPE HTML>
<!--[if lt IE 7]> <html class="no-js ie6" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="fr"> <!--<![endif]-->

	<head>
		<title>Guide des Etudes Supérieur</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

		<!-- Favicons
		================================================== -->
		<link rel="shortcut icon" href="images/favicon.ico">
		<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
		<link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">

		<!-- CSS
		================================================== -->
		<link rel="stylesheet" href="css/style.css" type="text/css">
		<link rel="stylesheet" href="css/responsive.css" type="text/css">

		<!-- / color -->
		<link class="colors_style" rel="stylesheet" href="css/color_style/color_3.css" type="text/css"/>
		<!-- / google font -->
		<link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>
		<!-- / settings_box -->
		<link rel="stylesheet" href="settings_box/settings_box.css" type="text/css">

		<!-- Load jQuery
		================================================== -->
		<script type="text/javascript" src="js/modernizr.custom.js"></script>
		<script type="text/javascript" src="js/device.min.js"></script>
	</head>

	<body class="bg-1">
		
		<div id="main" class="container">
			<header id="header">
				<div class="row">
					<div class="col-xs-12 col-md-6">
						<div class="header-item bg-0">
							<div class="line">
								<a href="index.html" id="header-logo" class="site-logo">GESCAM</a>

								<a href="#" class="custom-btn colored">English</a>
							</div>

							<div class="line">
								<p id="header-slogan">Guide des Etudes Supérieures au Cameroun</p>

								<div class="social-btn">
									<a class="icon-twitter-bird" href="#"></a>
									<a class="icon-linkedin-rect" href="#"></a>
									<a class="icon-facebook-rect" href="#"></a>
								</div>
							</div>
						</div>
					</div>

					<div class="col-xs-12 col-md-6">
						<div class="header-item bg-4">
							<a id="menu-open" class="" href="javascript:void(0);">Open Menu<span></span></a>

							<nav id="navigation" class="header-menu">
								<ul>
									
									<?php $tpl->initFrontTopMenu(); ?>
								</ul>
							</nav>

							<nav id="submenu" class="header-menu bg-2">
								<ul>
									<?php $tpl->initFrontSubTopMenu(); ?>
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</header>

			<section class="main-content">
				<div class="row matchHeight-container">
					<div class="col-xs-12 col-md-6">
						<div class="content-slider-container box">
							<div class="content-slider" data-animation="fade">
								<div class="slides-container">
									<div class="slide">
										<img class="img-responsive" src="images/slide_img/slider_small_1.jpg" alt="demo">

										<div class="description">
											<div class="inner">
												<p class="title">Discover your potential then Exceed it</p>

												<p>
													Enthusiast saphire university presidential luxury silver cultered wine. University engraved regal symbolizing fashion benefactor impressive inspiring pleasure rare
												</p>

												<a href="#" class="custom-btn">Learn More</a>
											</div>
										</div>
									</div>

									<div class="slide">
										<img class="img-responsive" src="images/slide_img/slider_small_2.jpg" alt="demo">

										<div class="description">
											<div class="inner">
												<p class="title">1 Discover your potential then Exceed it</p>

												<p>
													1 Enthusiast saphire university presidential luxury silver cultered wine. University engraved regal symbolizing fashion benefactor impressive inspiring pleasure rare
												</p>

												<a href="#" class="custom-btn">Learn More</a>
											</div>
										</div>
									</div>

									<div class="slide">
										<img class="img-responsive" src="images/slide_img/slider_small_3.jpg" alt="demo">

										<div class="description">
											<div class="inner">
												<p class="title">2 Discover your potential then Exceed it</p>

												<p>
													2 Enthusiast saphire university presidential luxury silver cultered wine. University engraved regal symbolizing fashion benefactor impressive inspiring pleasure rare
												</p>

												<a href="#" class="custom-btn">Learn More</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-xs-12 col-md-6">
						<div class="block-courses block-with-date box">
							<img class="img-responsive hidden-md" src="images/upcoming_1.jpg" alt="demo" />

							<img class="img-responsive visible-md" src="images/upcoming_1_1.jpg" alt="demo" />

							<div class="description">
								<div class="inner">
									<p class="title">Prochainement</p>

									<div class="date">
										<span class="first number">2</span>

										<span class="second number">6</span>

										<span class="month">Octobre</span>
									</div>

									<div class="text">
										<p>Forum de l'Etudiant - Edition 2016</p>

										<a href="www.forumdeletudiant.com" class="custom-btn">Plus d'infos</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="row matchHeight-container">
					<div class="col-xs-12 col-md-6">
						<div class="text-block box P30 bg-0">
							<p class="title h1">N°1 American University</p>

							<div class="text">
								<p>
									Presidential upper polo opulent luxury symphony five-star benefiting sheer. Opera gentlemen politically cuisine gifted club rich yacht becoming caviar.<br />Brilliant in a five-star in grande sterling benefactor. Ambassador rich metropolitan townhome pleasure art cigar. With champagne topiary portfolio sport delegate. Plure with echelon reserved elegant reserved echelon society symphony. Brokerage sport cruise yacht private.
								</p>
							</div>

							<a href="#" class="more-link colored"><i class="arrow"></i>Learn more</a>
						</div>
					</div>

					<div class="col-xs-12 col-md-6">
						<div class="video-block box">
							<div class="row">
								<div class="col-xs-12 col-sm-3 col-md-5 col-lg-4">
									<div class="column-description P30 bg-2 corner">
										<h5>Campus Spotlight</h5>

										<div class="text">
											<p>
												University rare opulent theatre becoming into property from auction gentlemen. Society symbolizing upper to panoramic enthusiast politically educated.
											</p>
										</div>

										<a href="#" class="stat-link"><i class="icon-signal"></i><span>Statistics</span></a>
									</div>
								</div>

								<div class="col-xs-12 col-sm-9 col-md-7 col-lg-8">
									<div class="video box" style="background-image: url(images/video_bg.jpg);">
										<a class="video-btn" href="https://www.youtube.com/embed/1zG1iq9LZ2U" data-gallery="portfolio">Play Video</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="info-container">
						<div class="col-xs-12 col-md-4">
							<div class="info-item P30 bg-7">
								<h3 class="icon-graduation-cap"><span>Be part of US</span></h3>

								<p>
									High-rise gentlemen cultered. Stockmarket art sheer board gold wishlist cultered pedigree echelon. 
								</p>

								<p>
									Architectural wealth luxury pedigree club le cultered gentlemen doctoral. Le doctoral manor with.
								</p>

								<a href="#" class="more-link"><i class="arrow"></i>Learn more</a>
							</div>
						</div>

						<div class="col-xs-12 col-md-4">
							<div class="info-item P30 bg-6">
								<h3 class="icon-search"><span>Find Allies</span></h3>

								<p>
									Upper handmade pearl architectural cutlery distinctly extra travel presidential bonds status. Impresario ballroom sheer. Impressive distinctly townhome diamond. Suite silk metropolitan diamond crafted doctoral board politically suite butler.
								</p>

								<a href="#" class="more-link"><i class="arrow"></i>Learn more</a>
							</div>
						</div>

						<div class="col-xs-12 col-md-4">
							<div class="info-item P30 bg-5">
								<h3 class="icon-lifebuoy"><span>Get Support</span></h3>

								<p>
									Politically a silk distinctly sport repertoire theatre dynasty rare. World elegant elegant philanthropic ballroom university.
								</p>

								<a href="#" class="more-link"><i class="arrow"></i>Learn more</a>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<footer id="footer">
						<div class="col-xs-12 col-sm-6 col-md-4">
							<div class="footer-item P30 bg-4">
								<a href="index.html" id="footer-logo" class="site-logo">University</a>

								<p id="footer-slogan">N°1 american University of<br />modern science</p>

								<div class="social-btn el-bottom">
									<a class="icon-twitter-bird" href="#"></a>
									<a class="icon-linkedin-rect" href="#"></a>
									<a class="icon-facebook-rect" href="#"></a>
								</div>
							</div>
						</div>

						<div class="col-xs-12 col-sm-6 col-md-2">
							<div class="footer-item P30 bg-4">
								<h5><small>Get in Touch</small></h5>

								<p>Rockefeller Center, 45 Rockefeller Plaza, New York, NY, USA</p>

								<p class="el-bottom">
									P:+1 123 444 5678<br />
									E: <a href="mailto:info@yoursite.com">info@yoursite.com</a>
								</p>
							</div>
						</div>

						<div class="col-xs-12 col-sm-6 col-md-2">
							<div class="footer-item P30 bg-2">
								<h5><small>Our Twitter</small></h5>

								<p>Elegant tailored work society into ornamental opera diplomatatic</p>

								<p class="el-bottom"><a href="#">Follow Us</a></p>
							</div>
						</div>

						<div class="col-xs-12 col-sm-6 col-md-4">
							<div class="footer-item footer-item_subscribe P30 bg-1">
								<h5><small>Newsletter Subscription</small></h5>

								<form id="footer-form" action="#">
									<p>Please subscribe to our University newsletters</p>

									<input type="text" />

									<button type="submit"><i class="arrow"></i></button>
								</form>

								<p class="el-bottom">&copy; 2013 University Site Name.All rights reserved</p>
							</div>
						</div>
					</footer>
				</div>
			</section>
		</div>

		<section id="mobile-menu-container">
			<a href="index_2.html" id="header-logo_2" class="site-logo">University</a>

			<a id="menu-close" href="javascript:void(0);">Close Menu</a>

			<nav id="mobile-navigation" class="mobile-menu">
				<ul>
					<li>
						<a href="#">Faculties</a>

						<div class="dropdown">
							<ul>
								<li><a href="faculties_1.html">Faculties 1</a></li>
								<li><a href="faculties_2.html">Faculties 2</a></li>
							</ul>
						</div>
					</li>

					<li>
						<a href="academics.html">Academics</a>
					</li>

					<li>
						<a href="#">Courses</a>

						<div class="dropdown">
							<ul>
								<li><a href="courses.html">Courses</a></li>
								<li><a href="courses_details.html">Courses Details</a></li>
							</ul>
						</div>
					</li>

					<li>
						<a href="#">Pages</a>

						<div class="dropdown">
							<ul>
								<li><a href="about.html">About Us</a></li>
								<li><a href="index_2.html">Home 2</a></li>
								<li><a href="login_2.html">Login 2</a></li>
								<li><a href="typography.html">Typography</a></li>
							</ul>
						</div>
					</li>

					<li>
						<a href="contact.html">Contact</a>
					</li>
				</ul>
			</nav>

			<nav id="mobile-submenu">
				<ul>
					<li><a href="campus_locations.html">Campus and locations</a></li>
					<li><a href="directory.html">Directory</a></li>
					<li><a href="study_advice.html">Study advice</a></li>
					<li><a href="login.html"><i class="icon-user"></i>Login</a></li>
				</ul>
			</nav>
		</section>

		<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
		<script type="text/javascript" src="js/jquery.nicescroll.min.js"></script>
		<script type="text/javascript" src="js/jquery.matchHeight-min.js"></script>
		<script type="text/javascript" src="js/jquery.superslides.min.js"></script>
		<script type="text/javascript" src="js/jquery.fs.boxer.min.js"></script>
		<script type="text/javascript" src="js/jquery.easing.js"></script>
		<script type="text/javascript" src="js/jquery.main.js"></script>
		<!-- / settings_box -->
		<script type="text/javascript" src="settings_box/settings_box.js"></script> 
	</body>
</html>