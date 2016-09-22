<?php
require('../class/Autoloader.php');
Autoloader::register();
$configSession = new ConfigSession;
$auth_session = new Authentified;
$nickname=$auth_session->user;
$currentUser = new User;
$nom=$currentUser->getUserName($auth_session->userID);
$db= new MyDB;
$tpl=new Template;
$page="profile";
//$rm=$tpl->getSubItems(1,2,6);

//foreach($rm as $valeur){
//	var_dump($valeur);
//	echo $valeur->nom_item_menu;
//}
//exit();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf8">
    <title>Guide des Etudes Supérieure au Cameroun - Espace d'administration</title>
	
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fonts.css">
	<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		
	<!-- PAGE LEVEL PLUGINS STYLES -->	
	<link href="assets/css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">
	<link href="assets/css/plugins/morris/morris.css" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/plugins/bootstrap-datepicker/datepicker.css">
	<!-- REQUIRE FOR SPEECH COMMANDS -->
	<link rel="stylesheet" type="text/css" href="assets/css/plugins/gritter/jquery.gritter.css" />

    <!-- Tc core CSS -->
	<link id="qstyle" rel="stylesheet" href="assets/css/themes/style.css">	
	<!--[if lte IE 8]>
		<link rel="stylesheet" href="assets/css/ie-fix.css" />
	<![endif]-->
	
	
    <!-- Add custom CSS here -->
	<link rel="stylesheet" href="assets/css/only-for-demos.css">

	<!-- End custom CSS here -->
	
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->
	
	<!--[if lte IE 8]>
	<script src="assets/js/plugins/easypiechart/easypiechart.ie-fix.js"></script>
	<![endif]-->

  </head>

  <body>
	<input type="hidden" id="varNom" value="<?= $nom ?>">
    <div id="wrapper">
		<div id="main-container">		
			<!-- BEGIN TOP NAVIGATION -->
				<nav class="navbar-top" role="navigation">
					<!-- BEGIN BRAND HEADING -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle pull-right" data-toggle="collapse" data-target=".top-collapse">
							<i class="fa fa-bars"></i>
						</button>
						<div class="navbar-brand">
							<a href="dashboard.php">
								<img src="assets/images/logo.png" alt="logo" class="img-responsive">
							</a>
						</div>
					</div>
					<!-- END BRAND HEADING -->
					
					<div class="nav-top">
						<!-- BEGIN RIGHT SIDE DROPDOWN BUTTONS -->
							<ul class="nav navbar-right">
								<li class="dropdown">
									<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
										<i class="fa fa-bars"></i>
									</button>
								</li>
								
								<li class="dropdown user-box">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<img class="img-circle" src="assets/images/user.jpg" alt=""> <span class="user-info"><?= $nom ?></span> <b class="caret"></b>
									</a>
										<ul class="dropdown-menu dropdown-user">
											<?php $tpl->initUserBox(); ?>
										</ul>
								</li>
								<!--Search Box-->
								<li class="dropdown nav-search-icon">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<span class="glyphicon glyphicon-search"></span>
									</a>
									<ul class="dropdown-menu dropdown-search">
										<li>
											<div class="search-box">
												<form class="" role="search">
													<input type="text" class="form-control" placeholder="Search" />
												</form>
											</div>
										</li>
									</ul>
								</li>
								<!--Search Box-->
							</ul>
						<!-- END RIGHT SIDE DROPDOWN BUTTONS -->
						
						<!-- BEGIN TOP MENU -->
							<div class="collapse navbar-collapse top-collapse">
								<!-- .nav -->
								<ul class="nav navbar-left navbar-nav">
									<?php $tpl->initTopNav(); ?>
								</ul><!-- /.nav -->
							</div>
						<!-- END TOP MENU -->
						
					</div><!-- /.nav-top -->
				</nav><!-- /.navbar-top -->
			<!-- END TOP NAVIGATION -->

				
			<!-- BEGIN SIDE NAVIGATION -->				
				<nav class="navbar-side" role="navigation">							
					<div class="navbar-collapse sidebar-collapse collapse">
					
						<!-- BEGIN SHORTCUT BUTTONS -->
						<div class="media">							
							<ul class="sidebar-shortcuts">
								<li><a class="btn"><i class="fa fa-user icon-only"></i></a></li>
								<li><a class="btn"><i class="fa fa-envelope icon-only"></i></a></li>
								<li><a class="btn"><i class="fa fa-th icon-only"></i></a></li>
								<li><a class="btn"><i class="fa fa-gear icon-only"></i></a></li>
							</ul>	
						</div>
						<!-- END SHORTCUT BUTTONS -->	
							
						<!-- BEGIN SIDE NAV MENU -->	
						<ul id="side" class="nav navbar-nav side-nav">
							<!-- BEGIN NAVIGATION CATEGORY -->
                            <!-- Navigation title -->
							<li>
								<h4>Navigation</h4> 								
							</li>
							<!-- END Navigation title -->
							
							<?php $tpl->initRmNav($page); ?>
							
							
							<!-- END Navigation category -->
                        </ul>
						<!-- END SIDE NAV MENU -->
						
					</div><!-- /.navbar-collapse -->
				</nav><!-- /.navbar-side -->
			<!-- END SIDE NAVIGATION -->
				

			<!-- BEGIN MAIN PAGE CONTENT -->
				<div id="page-wrapper">
					<!-- BEGIN PAGE HEADING ROW -->
						<div class="row">
							<div class="col-lg-12">
								<!-- BEGIN BREADCRUMB -->
								<div class="breadcrumbs">
									<ul class="breadcrumb">
										<li>
											<a href="#">Home</a>
										</li>
										<li class="active">Mon compte</li>
									</ul>
								</div>
								<!-- END BREADCRUMB -->	
								
								<div class="page-header title">
								<!-- PAGE TITLE ROW -->
									<h1>Mon compte <span class="sub-title">Content Overview</span></h1>									
								</div>
								
							</div><!-- /.col-lg-12 -->
						</div><!-- /.row -->
					<!-- END PAGE HEADING ROW -->					
					
					
					<div class="row">
							<div class="col-lg-12">
							
								<!-- START YOUR CONTENT HERE -->
								<div class="row">
									
									<!-- BEGIN MITTLE COLUMN -->
									<div class="col-lg-9 col-sm-12">

										<div class="row">
										
											
										</div>
								
										
										
										
										
									</div><!-- //col-lg-9 -->
									<!-- END MITTLE COLUMN -->
									
									
								
								</div>			
								<!-- END YOUR CONTENT HERE -->
					
							</div>
					</div>
						
					<!-- BEGIN FOOTER CONTENT -->		
						<div class="footer">
							<div class="footer-inner">
								<!-- basics/footer -->
								<div class="footer-content">
									&copy; 2016 <a href="http://www.groupenobis.com">Groupe NOBIS</a>, All Rights Reserved.
								</div>
								<!-- /basics/footer -->
							</div>
						</div>
						<button type="button" id="back-to-top" class="btn btn-primary btn-sm back-to-top">
							<i class="fa fa-angle-double-up icon-only bigger-110"></i>
						</button>
					<!-- END FOOTER CONTENT -->
						
				</div><!-- /#page-wrapper -->	  
			<!-- END MAIN PAGE CONTENT -->
		</div>  
	</div>

		 
    <!-- core JavaScript -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/js/plugins/pace/pace.min.js"></script>
	
	<!-- PAGE LEVEL PLUGINS JS -->
	<script src="assets/js/plugins/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
	<script src="assets/js/plugins/jqueryui/jquery.ui.touch-punch.min.js"></script>	
    <script src="assets/js/plugins/daterangepicker/moment.js"></script>
    <script src="assets/js/plugins/daterangepicker/daterangepicker.js"></script>	
    <script src="assets/js/plugins/morris/raphael-min.js"></script>
    <script src="assets/js/plugins/morris/morris.min.js"></script>
	<script src="assets/js/plugins/csstopdf/xepOnline.jqPlugin.js"></script>
	<script src="assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>
	<script src="assets/js/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
	<script src="assets/js/plugins/easypiechart/jquery.easypiechart.min.js"></script>
	<script src="assets/js/plugins/easypiechart/excanvas.compiled.js"></script>	
	<script src="assets/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
	<script src="assets/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

    <!-- Themes Core Scripts -->	
	<script src="assets/js/main.js"></script>
	
	<!-- REQUIRE FOR SPEECH COMMANDS -->
	<script src="assets/js/speech-commands.js"></script>
	<script src="assets/js/plugins/gritter/jquery.gritter.min.js"></script>		
	
	<!-- initial page level scripts for examples -->
	<script src="assets/js/plugins/slimscroll/jquery.slimscroll.init.js"></script>
	<script src="assets/js/home-page.init.js"></script>
	<script src="assets/js/plugins/jquery-sparkline/jquery.sparkline.init.js"></script>
	<script src="assets/js/plugins/easypiechart/jquery.easypiechart.init.js"></script>
	<script type="text/javascript">
		//Live Chat
		jQuery(function($) {
			$('#live-chat-ui header').on('click', function() {
			$('.chat').slideToggle(300, 'swing');
			$('.chat-message-counter').fadeToggle(300, 'swing');

		});

			$('.chat-close').on('click', function(e) {
				e.preventDefault();
				$('#live-chat-ui').fadeOut(300);
			});

		})

		$('#minicalendar').datepicker();
	</script>
  </body>
</html>