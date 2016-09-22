<?php
require('./lang/langue.php');
require('../class/Autoloader.php');
Autoloader::register();
$configSession = new ConfigSession;
$db= new MyDB;
$tpl=new Template;
$page="home";
$url = "http://".$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"];
if($lang=='fr')
	$switchLanguage=str_replace('/fr/', '/en/', $url);
if($lang=='en')
	$switchLanguage=str_replace('/en/', '/fr/', $url);
//$article=$tpl->getArticle(1);

//foreach($article as $valeur){
//	var_dump($valeur->text_article_fr);
//	echo $tpl->trunc($valeur->text_article_fr, 3);
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
		<link class="colors_style" rel="stylesheet" href="css/color_style/color_12.css" type="text/css"/>
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
								<a href="<?php echo ($lang=='en')?('../en/'):('../fr/'); ?>" id="header-logo" class="site-logo">GESCAM</a>

								<a href="<?= $switchLanguage ?>" class="custom-btn colored"><?php if($lang=='fr') echo 'english'; if($lang=='en') echo 'Français'; ?></a>
							</div>

							<div class="line">
								<p id="header-slogan"><?php echo ($lang=='en')?('Higher education\'s Guide in Cameroon'):('Guide des Etudes Supérieures au Cameroun'); ?></p>

								<div class="social-btn">
									<?php $tpl->loadSocialNetIcon(); ?>
								</div>
							</div>
						</div>
					</div>

					<div class="col-xs-12 col-md-6">
						<div class="header-item bg-4">
							<a id="menu-open" class="" href="javascript:void(0);"><?php echo ($lang=='en')?('Open Menu'):('Ouvrir le Menu'); ?><span></span></a>

							<nav id="navigation" class="header-menu">
								<ul>
									<?php $tpl->initFrontTopMenu($lang); ?>
								</ul>
							</nav>

							<nav id="submenu" class="header-menu bg-2">
								<ul>
									<?php $tpl->initFrontSubTopMenu($lang); ?>
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
									<?php $tpl->loadSlideshow($lang); ?>
								</div>
							</div>
						</div>
					</div>

					<div class="col-xs-12 col-md-6">
						<div class="block-courses block-with-date box">
							<img class="img-responsive hidden-md" src="images/upcoming_1.jpg" alt="demo" />

							<img class="img-responsive visible-md" src="images/upcoming_1_1.jpg" alt="demo" />

							<?php $tpl->loadNextEvent($lang); ?>
						</div>
					</div>
				</div>

				<div class="row matchHeight-container">
					<?php $tpl->initArticleVedette($lang); ?>
				</div>
				
				<div class="row">
					<div class="info-container">
						<?php $tpl->initBlocInfos($lang); ?>
						<div class="col-xs-12 col-md-4">
							<div class="footer-item_subscribe info-item P30 bg-5">
								<h3 class="icon-graduation-cap"><span><?php echo ($lang=='en')?('Search'):('Trouver une formation'); ?></span></h3>

								<p>
									<?php echo ($lang=='en')?('To find a training, please enter a keyword here'):('Pour effectuer une recherche de formation, entrer tout simplement un mot clé'); ?> 
								</p>
								<p>
								<form id="footer-form" action="#">
									<input type="text" />
									<button type="submit"><i class="arrow"></i></button>
								</form>
								</p>
								<a href="#" class="more-link"><i class="arrow"></i><?php echo ($lang=='en')?('More details'):('Recherche détaillée'); ?></a>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<footer id="footer">
						<div class="col-xs-12 col-sm-6 col-md-4">
							<div class="footer-item P30 bg-4">
								<a href="index.html" id="footer-logo" class="site-logo">GESCAM</a>

								<p id="footer-slogan"><?php echo ($lang=='en')?('Higher\'s Education Guide'):('Guide des études supérieures'); ?><br /><?php echo ($lang=='en')?('in Cameroon'):('au Cameroun'); ?></p>

								<div class="social-btn el-bottom">
									<?php $tpl->loadSocialNetIcon(); ?>
								</div>
							</div>
						</div>

						<div class="col-xs-12 col-sm-6 col-md-4">
							<div class="footer-item P30 bg-2">
								<h5><small><?php echo ($lang=='en')?('Get in Touch'):('Nous contacter'); ?></small></h5>

								<p>MINESUP<br/><?php echo ($lang=='en')?('Direction of the Assistance and the University Works'):('Direction de l’Assistance et des Œuvres Universitaires'); ?><br/>SDOAP<br/><?php echo ($lang=='en')?('Ministerial Building N°2, 15th Floor, door 1544'):('Immeuble Ministériel N°2, 15ème Etage, porte 1544'); ?></p>

								<p class="el-bottom">
									<i class="icon-phone-1"></i> : +237 222 710 741<br />
								</p>
							</div>
						</div>

						<div class="col-xs-12 col-sm-6 col-md-4">
							<div class="footer-item footer-item_subscribe P30 bg-1">
								<h5><small>Newsletter</small></h5>

								<form id="footer-form" action="#">
									<p><?php echo ($lang=='en')?('Please subscribe to our newsletter'):('Inscrivez-vous à notre newsletter'); ?></p>

									<input type="text" />

									<button type="submit"><i class="arrow"></i></button>
								</form>

								<p class="el-bottom">&copy; 2016 MINESUP. <?php echo ($lang=='en')?('All rights reserved'):('Tous droits réservés'); ?></p>
							</div>
						</div>
					</footer>
				</div>
			</section>
		</div>

		<section id="mobile-menu-container">
			<a href="index_2.html" id="header-logo_2" class="site-logo">GESCAM</a>

			<a id="menu-close" href="javascript:void(0);"><?php echo ($lang=='en')?('Close Menu'):('Fermer le Menu'); ?></a>

			<nav id="mobile-navigation" class="mobile-menu">
				<ul>
					<?php $tpl->initXSFrontTopMenu($lang); ?>
				</ul>
			</nav>

			<nav id="mobile-submenu">
				<ul>
					<?php $tpl->initFrontSubTopMenu($lang); ?>
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
		
		<!-- FONCTION PERSO -->
		<script type="text/javascript">
		$(document).ready(function(){
			//SUBMIT SEARCH TRAININGs FORM
			$('#search-training-form').submit(function(){
				alert('recherche lancée!!!');
			})
		})
	</body>
</html>