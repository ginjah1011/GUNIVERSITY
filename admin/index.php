<?php
require('../class/Autoloader.php');
Autoloader::register();
$configSession = new ConfigSession;
//echo 'URL: http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
//exit();
$db=new MyDB;
$install=true;
if($db->countRow("tpl_users")>=1)
	$install=false;
//die(sha1("18jls951ku"));
//$p='3fc0bd023239b9d4d067952fd7910af5';
//var_dump($db->row('UPDATE tpl_users SET user_activation_key = "'.sha1($key_activation).'" WHERE hash_login = "'.$identifiant.'" AND id_user = '.$id));
//var_dump($db->boolQuery('DELETE FROM tpl_users WHERE user_login LIKE ? OR user_login LIKE ?', array("%n%", "%m%")));
//exit();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Connexion - Espace d'administration Guide des Etudes Supérieures</title>
	
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fonts.css">
	<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
	
	<!-- PAGE LEVEL PLUGINS STYLES -->
	<!-- REQUIRE FOR SPEECH COMMANDS -->
	<link rel="stylesheet" type="text/css" href="assets/css/plugins/gritter/jquery.gritter.css" />	

    <!-- Tc core CSS -->
	<link id="qstyle" rel="stylesheet" href="assets/css/themes/style.css">	
	<!--[if lte IE 8]>
		<link rel="stylesheet" href="assets/css/ie-fix.css" />
	<![endif]-->
	
	
    <!-- Add custom CSS here -->

	<!-- End custom CSS here -->
	
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
		
		table,td
		{
			width:100%;
			border-collapse:collapse;
			padding:10px;
		}
		
		.err_msg
		{
			color:#C00;
			font-size:11px;
			font-style:italic;
			display: none;
			
		}
		.check_input{
			color:#0C0;
		}
	</style>
	
  </head>

  <body class="login">
	<div id="wrapper">
			<!-- BEGIN MAIN PAGE CONTENT -->
			
			<div class="login-container">
				<h2>
					<a href="../home"><img src="assets/images/logo.png" alt="logo" class="img-responsive"></a><!-- can use your logo-->
				</h2>
				<!-- BEGIN LOGIN BOX -->
				<div id="login-box" class="login-box visible">					
					<p id="title_connect" class="bigger-110">
						Connexion à l'espace d'administration
					</p>
                    <p id="title_init" class="bigger-110">
						Réinitialisation de mot de passe
					</p>
					
					<div class="hr hr-8 hr-double dotted"></div>
					<p id="log-mess"></p>
					<div id="login-div">
                    <form id="log-form" method="post">
						<div class="form-group">
							<div class="input-icon right">
								<span class="fa fa-key text-gray"></span>
								<input type="text" id="login_connect" name="login_connect" class="form-control" placeholder="Identifiant">
                                <div id='err_log_user' class="err_msg"></div>
							</div>
						</div>
						<div class="form-group">
							<div class="input-icon right">
								<span class="fa fa-lock text-gray"></span>
								<input type="password" id="mdp_connect" name="mdp_connect" class="form-control" placeholder="Mot de passe">
                                <div id='err_log_mdp' class="err_msg"></div>
							</div>
						</div>
						<div class="tcb">
							
							<a href="#" id="connect-btn" class="pull-right btn btn-primary">Se connecter<i class="fa fa-key icon-on-right"></i></a>
							<div class="clearfix"></div>
						</div>				
					
                    
                    </form>
                    <div class="footer-wrap">
						<span class="pull-left">
							<a href="#" id="link_forgot_log" onclick="$('#forgot-mess').text(''); $('#forgot1-form').show(); show_box('forgot-box'); return false;"><i class="fa fa-angle-double-left"></i> Mot de passe oublier?</a>
						</span>
						
						<?php if($install) {?>
						<span class="pull-right">
							<a href="#" id="link_newuser_log"  onclick="show_box('registration-box'); $('#reg-form').fadeIn(500); $('#reg-mess').empty(); return false;">Nouvel utilisateur <i class="fa fa-angle-double-right"></i></a>
						</span>
						<?php }?>	
						<div class="clearfix"></div>
					</div><!-- END LOGIN DIV -->
                    </div>
                    <form method="post" id="forgot2-form" >
						<div class="form-group">
							<div class="input-icon right">
								<span id="check_Ok_init_mdp1" class="check_input fa fa-check"></span>
                                <a id="show_init_mdp1" href="#"><span class="fa fa-eye text-gray"></span></a>
								<input type="password" name="init_mdp1" id="init_mdp1" class="form-control" placeholder="Nouveau mot de passe">
                                <div id='msg_err_init_mdp1' class="err_msg"></div>
							</div>
						</div>
						<div class="form-group">
							<div class="input-icon right">
								<span id="check_Ok_init_mdp2" class="check_input fa fa-check"></span>
                                <a id="show_init_mdp2" href="#"><span class="fa fa-eye text-gray"></span></a>
								<input type="password" name="init_mdp2" id="init_mdp2" class="form-control" placeholder="confirmer votre nouveau mot de passe">
                                <div id='msg_err_mdp2' class="err_msg"></div>
							</div>
						</div>
						<a href="#" id="init-btn" class="pull-right btn btn-danger">Réinitialiser</a>
						
						<div class="clearfix"></div>
                        <div class="footer-wrap">
						<a href="#" onclick="$('#title_init').hide(); $('#forgot2-form').hide(); $('#login-div').fadeIn(500); $('#title_connect').fadeIn(500); $('#log-mess').text(''); return false;">Retour à la page de connexion <i class="fa fa-angle-double-right"></i></a>
					</div>
                    	<input type="hidden" id="id_toInit" name="id_toInit" >
					</form>
				</div>
				<!-- END LOGIN BOX -->
                
                <!-- BEGIN FORGOT BOX -->
				<div id="forgot-box" class="login-box">				
					<p class="bigger-110">
						<i class="fa fa-key"></i> Réinitialiser le mot de passe
					</p>
					
					<div class="hr hr-8 hr-double dotted"></div>
					<p id="forgot-mess"></p>
					<form method="post" id="forgot1-form" >
						<div class="form-group">
							<div class="input-icon right">
								<span class="fa fa-envelope text-gray"></span>
								<input type="email" name="email_forgot" id="email_forgot" class="form-control" placeholder="Email">
                                <div id='err_email_forgot' class="err_msg"></div>
								<span class="help-block">Entrer votre addresse email pour réinitialiser votre mot de passe</span>
							</div>
						</div>
						<a href="#" id="forgot-btn" class="pull-right btn btn-danger">Valider</a>
						
						<div class="clearfix"></div>
					</form>
                   <div class="footer-wrap">
						<a href="#" onclick="show_box('login-box'); return false;">Retour à la page de connexion <i class="fa fa-angle-double-right"></i></a>
					</div>					
				</div>
				<!-- END FORGOT BOX -->
				
				<!-- BEGIN REGISTRATION BOX -->
				<div id="registration-box" class="login-box">				
					<p class="bigger-110">
						<i class="fa fa-users"></i> Enregistrement d'un nouvel utilisateur
					</p>
					<div class="hr hr-8 hr-double dotted"></div>
					<p id="reg-mess"></p>
					<form id="reg-form" method="post" action="#">
						<div class="form-group">
							<div class="input-icon right">
								<span id="check_Ok_cname" class="check_input fa fa-check"></span>
                                <span class="fa fa-user text-gray"></span>
								<input type="text" name="cname" id="cname" class="form-control" placeholder="Votre nom complet">
                                <div id='msg_err_nom' class="err_msg"></div>
							</div>
						</div>					
						<div class="form-group">
							<div class="input-icon right">
								<span id="check_Ok_email_reg" class="check_input fa fa-check"></span>
                                <span class="fa fa-envelope text-gray"></span>
								<input type="email" name="email_reg" id="email_reg" class="form-control" placeholder="Votre email">
                                <div id='msg_err_email' class="err_msg"></div>
							</div>
						</div>
						<div class="form-group">
							<div class="input-icon right">
								<span id="check_Ok_login_reg" class="check_input fa fa-check"></span>
                                <span class="fa fa-key text-gray"></span>
								<input type="text" name="login_reg" id="login_reg" class="form-control" placeholder="Votre identifiant">
                                <div id='msg_err_login' class="err_msg"></div>
							</div>
						</div>
						<div class="form-group">
							<div class="input-icon right">
								<span id="check_Ok_mdp1" class="check_input fa fa-check"></span>
                                <a id="show_mdp1" href="#"><span class="fa fa-eye text-gray"></span></a>
								<input type="password" name="mdp1" id="mdp1" class="form-control" placeholder="Entrer votre mot de passe">
                                <div id='msg_err_mdp1' class="err_msg"></div>
							</div>
						</div>
						<div class="form-group">
							<div class="input-icon right">
								<span id="check_Ok_mdp2" class="check_input fa fa-check"></span>
                                <a id="show_mdp2" href="#"><span class="fa fa-eye text-gray"></span></a>
								<input type="password" name="mdp2" id="mdp2" class="form-control" placeholder="confirmer votre mot de passe">
                                <div id='msg_err_mdp2' class="err_msg"></div>
							</div>
						</div>
						
						<p><a href="#" id="reg-btn" class="btn btn-success">S'enregistrer<i class="fa fa-angle-double-right icon-on-right"></i></a></p>
                        
					</form>	
						<div class="footer-wrap">
								<a href="#" onclick="show_box('login-box'); return false;"><i class="fa fa-angle-double-left"></i> Retour à la page de connexion</a>
						</div>							
					
				</div>
				<!-- END REGISTRATION BOX -->
			</div>
			
			
			<!-- END MAIN PAGE CONTENT --> 
	</div> 
	 
    <!-- core JavaScript -->
    <script src="assets/js/jquery.min.js"></script>
    <!-- <script src="assets/js/jquery-1.11.3-jquery.min.js"></script> -->
    <script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/js/plugins/pace/pace.min.js"></script>
	
	<!-- PAGE LEVEL PLUGINS JS -->
	
    <!-- Themes Core Scripts -->	
	<script src="assets/js/main.js"></script>

	<!-- REQUIRE FOR SPEECH COMMANDS -->
	<script src="assets/js/speech-commands.js"></script>
	<script src="assets/js/plugins/gritter/jquery.gritter.min.js"></script>	
	
	<!-- initial page level scripts for examples -->	
	<script type="text/javascript">
		function show_box(id) {
			jQuery('.login-box.visible').removeClass('visible');
			jQuery('#'+id).addClass('visible');
		}
		
		$.urlParam = function(name){
			var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
			return results[1] || '';
		}
	</script>
    
    <!-- SIGNIN FORM SUBMIT-->
    <script type="text/javascript">
	$(document).ready(function(){	
		$(".check_input").hide();
		$('#forgot2-form').hide();
		$('#title_init').hide();
		
		/**************************** ACTIVATION DE COMPTE ***************************************/
		//TRAITEMENT POUR ACTIVATION DE COMPTE
		if((window.location.href.indexOf('?log')!=-1) && (window.location.href.indexOf('&cle')!=-1)){
			var acti_log=$.urlParam('log');
			var acti_key=$.urlParam('cle');
			
			if(acti_log.match(/^[a-z0-9._-]+$/i) && acti_key.match(/^[a-z0-9]+$/i)){
				urlData='log='+acti_log+'&cle='+acti_key;
				$.ajax({
							type : 'GET',
							url  : '../class/handlerActivation.php',
							data : urlData,
							success : function(urlData)
									  {						
											$("#log-mess").html(urlData);
									  }
						});
			}
		}
		/**************************** FIN SECTION ACTIVATION DE COMPTE ***************************************/
		
		
		
		
		/**************************** REINITIALISATION MOT DE PASSE ***************************************/
		//TRAITEMENT POUR REINITIALISATION MOT DE PASSE VERIFICATION PARAMETRES LIEN
		if(window.location.href.indexOf('?initKey')!=-1){
			$('#login-div').hide();
			$('#title_connect').hide();
			var init_key=$.urlParam('initKey');
			
			//?init1=cbc047b8459d4e8ce09aa01e3573525c9f9d2df0&init2=k4h2dyswdb
			data='initKey='+init_key;
			
			$.ajax({
						type : 'GET',
						url  : '../class/handlerBeforeInitPass.php',
						data : data,
						success : function(data)
								  {						
										if(data==0){
											$("#log-mess").fadeIn(500).text('tsst! tsst! Das geht ja nicht!!!');
											$('#title_init').show();
										}
										else if(data>0){
											$('#forgot2-form').show();
											$('#title_init').show();
											$('#id_toInit').val(data);
										}
										else{
											$("#log-mess").text('Da ist was schiefgelaufen!!!');
											$('#title_init').show();
										}
								  }
			});
		}
		
		//
		//REINITIALISATION MDP INITFORM
		/* LIVE CHECK INPUT MDP1_INIT IN INITFORM*/
		$('#init_mdp1').keyup(function(){
			if($("#init_mdp1").val() == null || $("#init_mdp1").val() == ''){
				$("#init_mdp1").css("border-color", "#FF0003");
				$("#init_mdp1").next('.err_msg').fadeIn().text("Veuillez entrer votre mot de passe");
				$("#init_show_mdp1").fadeIn();
				$("#check_Ok_mdp1").fadeOut();
				$("#show_mdp2").fadeIn();
				$("#check_Ok_mdp2").fadeOut();
			}
			else if(!($("#init_mdp1").val().match(/^[a-z0-9,:;()@!*._-éèöëùà]+$/i))){
				$("#init_mdp1").css("border-color", "#FF0003");
				$("#init_mdp1").next('.err_msg').fadeIn().html("Veuillez entrer un mot de passe valide<br/>Pas de caractères spéciaux autres que é è ö ë ù à , : ; ( ) @ ! * . _ - ");
				$("#show_init_mdp1").fadeIn();
				$("#check_Ok_init_mdp1").fadeOut();
				$("#show_init_mdp2").fadeIn();
				$("#check_Ok_init_mdp2").fadeOut();
			}
			else{
				if($("#init_mdp1").val().length<=5){
					$("#init_mdp1").css("border-color", "#FF0003");
					$("#init_mdp1").next('.err_msg').fadeIn().text("Le mot de passe doit contenir au moins 4 caractères");
					$("#show_inti_mdp1").fadeIn();
					$("#check_Ok_init_mdp1").fadeOut();
					$("#show_inti_mdp2").fadeIn();
					$("#check_Ok_inti_mdp2").fadeOut();	
				}
				else{
					$("#init_mdp1").next('.err_msg').fadeOut().text("");
					$("#init_mdp1").css("border-color", "#0C0");
					mdp1_init__ok=true;
				}	
			}
			
		});
		
		/* LIVE CHECK INPUT MDP2 IN REGFORM*/
		$('#init_mdp2').keyup(function(){
			if($("#init_mdp2").val() != $("#init_mdp1").val()){
				$("#init_mdp2").css("border-color", "#FF0003");
				$("#init_mdp2").next('.err_msg').fadeIn().text("Ce mot de passe ne correspond pas au précedent");
				$("#show_init_mdp1").fadeIn();
				$("#check_Ok_init_mdp1").fadeOut();
				$("#show_init_mdp2").fadeIn();
				$("#check_Ok_init_mdp2").fadeOut();
			}
			else{
				if($("#init_mdp1").val()=='' || $("#init_mdp1").val()==null){
					$("#show_init_mdp1").fadeIn();
					$("#check_Ok_init_mdp1").fadeOut();
					$("#show_init_mdp2").fadeIn();
					$("#check_Ok_init_mdp2").fadeOut();
				}
				else{
					$("#init_mdp2").next('.err_msg').fadeOut().text("");
					$("#init_mdp2").css("border-color", "#0C0");
					$("#show_init_mdp1").fadeOut();
					$("#check_Ok_init_mdp1").fadeIn();
					$("#show_init_mdp2").fadeOut();
					$("#check_Ok_init_mdp2").fadeIn();	
				}	
			}
		});
		
		
		//VALIDATION DU FORMULAIRE REINITIALISATION MOT DE PASSE
		$(document).on('click', '#init-btn', function(){
			var init_mdp1=$("#init_mdp1").val();
			var init_mdp2=$("#init_mdp2").val();
			var valide_init_mdp1=false;
			var valide_init_mdp2=false;
			$("#forgot-mess").text('');
			
			//**
			if($("#init_mdp1").val() == null || $("#init_mdp1").val() == ''){
				$("#init_mdp1").css("border-color", "#FF0003");
				$("#init_mdp1").next('.err_msg').fadeIn().text("Veuillez entrer votre mot de passe");
				$("#init_show_mdp1").fadeIn();
				$("#check_Ok_mdp1").fadeOut();
				$("#show_mdp2").fadeIn();
				$("#check_Ok_mdp2").fadeOut();
			}
			else if(!($("#init_mdp1").val().match(/^[a-z0-9,:;()@!*._-éèöëùà]+$/i))){
				$("#init_mdp1").css("border-color", "#FF0003");
				$("#init_mdp1").next('.err_msg').fadeIn().html("Veuillez entrer un mot de passe valide<br/>Pas de caractères spéciaux autres que é è ö ë ù à , : ; ( ) @ ! * . _ - ");
				$("#show_init_mdp1").fadeIn();
				$("#check_Ok_init_mdp1").fadeOut();
				$("#show_init_mdp2").fadeIn();
				$("#check_Ok_init_mdp2").fadeOut();
			}
			else{
				if($("#init_mdp1").val().length<=5){
					$("#init_mdp1").css("border-color", "#FF0003");
					$("#init_mdp1").next('.err_msg').fadeIn().text("Le mot de passe doit contenir au moins 4 caractères");
					$("#show_inti_mdp1").fadeIn();
					$("#check_Ok_init_mdp1").fadeOut();
					$("#show_inti_mdp2").fadeIn();
					$("#check_Ok_inti_mdp2").fadeOut();	
				}
				else{
					$("#init_mdp1").next('.err_msg').fadeOut().text("");
					$("#init_mdp1").css("border-color", "#0C0");
					valide_init_mdp1=true;
				}	
			}
			
			//**
			if($("#init_mdp2").val() != $("#init_mdp1").val()){
				$("#init_mdp2").css("border-color", "#FF0003");
				$("#init_mdp2").next('.err_msg').fadeIn().text("Ce mot de passe ne correspond pas au précedent");
				$("#show_init_mdp1").fadeIn();
				$("#check_Ok_init_mdp1").fadeOut();
				$("#show_init_mdp2").fadeIn();
				$("#check_Ok_init_mdp2").fadeOut();
			}
			else{
				if($("#init_mdp1").val()=='' || $("#init_mdp1").val()==null){
					$("#show_init_mdp1").fadeIn();
					$("#check_Ok_init_mdp1").fadeOut();
					$("#show_init_mdp2").fadeIn();
					$("#check_Ok_init_mdp2").fadeOut();
				}
				else{
					$("#init_mdp2").next('.err_msg').fadeOut().text("");
					$("#init_mdp2").css("border-color", "#0C0");
					$("#show_init_mdp1").fadeOut();
					$("#check_Ok_init_mdp1").fadeIn();
					$("#show_init_mdp2").fadeOut();
					$("#check_Ok_init_mdp2").fadeIn();
					valide_init_mdp2=true;
				}	
			}
			
			var idToInit=$('#id_toInit').val();
			alert('valide_init_mdp1='+valide_init_mdp1+' - valide_init_mdp2='+valide_init_mdp2+' - init_mdp1='+init_mdp1+' - init_mdp2='+init_mdp2);
			if(valide_init_mdp1==true && valide_init_mdp2==true && init_mdp1==init_mdp2){
				
				alert('ok');
				data='init_mdp1='+init_mdp1+'&init_mdp2='+init_mdp2+'&id_toInit='+idToInit;
				alert(data);
				$.ajax({
							type : 'POST',
							url  : '../class/handlerInitPassAfter.php',
							data : data,
							success : function(data)
									  {						
											if(data=='update ok'){
												$('#title_init').hide();
												$('#forgot2-form').hide();
												$('#login-div').show();
												$('#title_connect').show();
												$("#log-mess").fadeIn(500).text('Votre mot de passe a été réinitialisé.');
											}
											else if(data=='update failed'){
												//$('#forgot2-form').show();
												//$('#title_init').show();
												$("#log-mess").fadeIn(500).text('Une erreur est survenue lors de la réinitialisation de votre mot de passe. Veuillez réessayer.');
												
											}
											else{
												$("#log-mess").fadeIn(500).text(data);
											}
									  }
				});
			}
			
		});
		
		/* SHOW PASSWORD INIT FORM*/
		//$('#forgot2-form').show();
		$('#show_init_mdp1').on('mouseover', function(){
		  $("#init_mdp1").attr("type", "text");
		  return false;
		});
		$('#show_init_mdp1').on('mouseleave', function(){
		  $("#init_mdp1").attr("type", "password");
		  return false;
		});
		$('#show_init_mdp2').on('mouseover', function(){
		  $("#init_mdp2").attr("type", "text");
		  return false;
		});
		$('#show_init_mdp2').on('mouseleave', function(){
		  $("#init_mdp2").attr("type", "password");
		  return false;
		});
		/**************************** FIN SECTION RENITIALISATION PASSWORD ***************************************/
		
		
		
		/************************************ SECTION FORGOT PASSWORD ***************************************************/
		/* LIVE CHECK INPUT EMAIL IN FORGOT FORM */
		$('#email_forgot').blur(function(){
			if($("#email_forgot").val() == null || $("#email_forgot").val() == ''){
				$("#email_forgot").css("border-color", "#FF0003");
				$("#email_forgot").next('.err_msg').fadeIn().text("Veuillez entrer votre adresse email");
				$("#email_forgot").prev('.text-gray').fadeIn();
			}
			else if(!($("#email_forgot").val().match(/^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/))){
				$("#email_forgot").css("border-color", "#FF0003");
				$("#email_forgot").next('.err_msg').fadeIn().text("Adresse email invalide");
				$("#email_forgot").prev('.text-gray').fadeIn();
			}
			else{
				$("#email_forgot").next('.err_msg').fadeOut().text("");
				$("#email_forgot").css("border-color", "#0C0");
			}
		});
		
		
		/* ENVOI FORMULAIRE POUR REINITIALISATION MOT DE PASSE */
		$(document).on('click', '#forgot-btn', function(){
			var email_forgot='';
			var valide_email_forgot=false;
			$("#forgot-mess").text('');
			
			//CHECK IDENTIFIANT
			if($("#email_forgot").val() == null || $("#email_forgot").val() == ''){
				$("#email_forgot").css("border-color", "#FF0003");
				$("#email_forgot").next('.err_msg').fadeIn().text("Veuillez entrer votre adresse email");
				$("#email_forgot").prev('.text-gray').fadeIn();
			}
			else if(!($("#email_forgot").val().match(/^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/))){
				$("#email_forgot").css("border-color", "#FF0003");
				$("#email_forgot").next('.err_msg').fadeIn().text("Adresse email invalide");
				$("#email_forgot").prev('.text-gray').fadeIn();
			}
			else{
				$("#email_forgot").next('.err_msg').fadeOut().text("");
				$("#email_forgot").css("border-color", "#0C0");
				valide_email_forgot=true;
			}
			
			//CHAMP OK
			if(valide_email_forgot){
				email_forgot=$("#email_forgot").val();
				data='email='+email_forgot;
				$.ajax({
					type : 'POST',
					url  : '../class/handlerInitPass.php',
					data : data,
					success :  function(data)
							   {						
									if(data=='email not found'){
										$("#forgot-mess").fadeIn(500).text('Aucun compte existant avec cette adresse email');
										$("#email_forgot").css("border-color", "#FF0003");
									}
									else if(data=='envoi ok'){
										$("#email_forgot").css("border-color", "#E5E5E5");
										$("#forgot1-form").trigger("reset");
										$('#forgot1-form').fadeOut(500);
										$("#forgot-mess").fadeIn(500).text('Un mail de réinitialisation de votre mot de passe vous a été envoyé.');
									}
									else{
										$("#forgot-mess").fadeIn(500).text("Un mail de réinitialisation a déjà été envoyé à cette adresse");
									}
									
								}
				});
				return false;	
			}
		});
		
		/******************************** FIN SECTION FORGOT PASSWORD ***************************************************/
		
		
		
		/************************************ SECTION LOGIN FORM ***************************************************/
		/* LIVE CHECK INPUT LOGIN IN LOGIN FORM */
		$('#login_connect').keyup(function(){
			if($('#login_connect').val()!=''){
				if(!($("#login_connect").val().match(/^[a-z0-9._-]+$/i))){
					$("#login_connect").css("border-color", "#FF0003");
					$("#login_connect").next('.err_msg').fadeIn().html("Cet identifiant n'est pas valide<br/>Pas de caractères spéciaux autres que . - ou _ ");
				}
				else{
					$("#login_connect").next('.err_msg').fadeOut().text("");
					$("#login_connect").css("border-color", "#E5E5E5");
				}
			}
		});
		
		/* LIVE CHECK INPUT PASSWORD IN LOGIN FORM */
		$('#mdp_connect').keyup(function(){
			if($('#mdp_connect').val()!=''){
				if(!($("#mdp_connect").val().match(/^[a-z0-9,:;()@!*._-éèöëùà]+$/i))){
					$("#mdp_connect").css("border-color", "#FF0003");
					$("#mdp_connect").next('.err_msg').fadeIn().html("Ce mot de passe n'est pas valide<br/>Pas de caractères spéciaux autres que é è ö ë ù à , : ; ( ) @ ! * . _ - ");
				}
				else{
					$("#mdp_connect").next('.err_msg').fadeOut().text("");
					$("#mdp_connect").css("border-color", "#E5E5E5");
				}
			}
		});
		
		
		//VALIDATION DU FORMULAIRE CONNEXION AVEC BOUTON "SE CONNECTER"
		//
		$('#show_mdp1').on('mouseover', function(){
		  $("#mdp1").attr("type", "text");
		  return false;
		});
		$('#show_mdp1').on('mouseleave', function(){
		  $("#mdp1").attr("type", "password");
		  return false;
		});
		$(document).on('click', '#connect-btn', function(){
			var log_user='';
			var log_mdp='';
			var valide_log_user=false;
			var valide_log_mdp=false;
			$("#log-mess").text('');
			
			//CHECK IDENTIFIANT
			if($("#login_connect").val() == null || $("#login_connect").val() == ''){
				$("#login_connect").css("border-color", "#FF0003");
				$("#login_connect").next('.err_msg').fadeIn().text("Veuillez entrer votre identifiant");
			}
			else if(!($("#login_connect").val().match(/^[a-z0-9._-]+$/i))){
				$("#login_connect").css("border-color", "#FF0003");
				$("#login_connect").next('.err_msg').fadeIn().html("Cet identifiant n'est pas valide<br/>Pas de caractères spéciaux autres que . - ou _ ");
			}
			else{
				$("#login_connect").next('.err_msg').fadeOut().text("");
				$("#login_connect").css("border-color", "#E5E5E5");
				var valide_log_user=true;
			}
			
			//CHECK MOT DE PASSE
			if($("#mdp_connect").val() == null || $("#mdp_connect").val() == ''){
				$("#mdp_connect").css("border-color", "#FF0003");
				$("#mdp_connect").next('.err_msg').fadeIn().text("Veuillez entrer votre mot de passe");
			}
			else if(!($("#mdp_connect").val().match(/^[a-z0-9,:;()@!*._-éèöëùà]+$/i))){
				$("#mdp_connect").css("border-color", "#FF0003");
				$("#mdp_connect").next('.err_msg').fadeIn().html("Ce mot de passe n'est pas valide<br/>Pas de caractères spéciaux autres que é è ö ë ù à , : ; ( ) @ ! * . _ - ");
			}
			else{
				$("#mdp_connect").next('.err_msg').fadeOut().text("");
				$("#mdp_connect").css("border-color", "#E5E5E5");
				var valide_log_mdp=true;
			}
			
			//CHAMP OK
			if(valide_log_user && valide_log_mdp){
				var log_user=$("#login_connect").val();
				var log_mdp=$("#mdp_connect").val();
				data='identifiant='+log_user+'&mdp='+log_mdp;
				$.ajax({
					type : 'POST',
					url  : '../class/handlerLogin.php',
					data : data,
					success :  function(data)
							   {						
									if(data=='Connexion reussie'){
										$("#log-form").trigger("reset");
										$("#log-mess").fadeIn(500).html(data);
										window.open("dashboard.php","_self");
									}
									else if(data=='Compte inactif'){
										$("#log-mess").fadeIn(500).html('Ce compte n\'est pas actvié. Veuillez contacter votre administrateur.');
									}
									else{
										$("#log-mess").fadeIn(500).html(data);
									}
									
								}
				});
				return false;	
			}
		});
		/************************************ FIN SECTION LOGIN FORM ***************************************************/
		
		
		
		/************************************ SECTION REGISTRATION FORM ********************************************/
		/* SHOW PASSWORD */
		$('#show_mdp1').on('mouseover', function(){
		  $("#mdp1").attr("type", "text");
		  return false;
		});
		$('#show_mdp1').on('mouseleave', function(){
		  $("#mdp1").attr("type", "password");
		  return false;
		});
		$('#show_mdp2').on('mouseover', function(){
		  $("#mdp2").attr("type", "text");
		  return false;
		});
		$('#show_mdp2').on('mouseleave', function(){
		  $("#mdp2").attr("type", "password");
		  return false;
		});
		
		
		
		/* LIVE CHECK INPUT NAME IN REGFORM*/
		$('#cname').blur(function(){
			if($("#cname").val() == null || $("#cname").val() == ''){
				$("#cname").css("border-color", "#FF0003");
				$("#cname").next('.err_msg').fadeIn().text("Veuillez entrer votre nom.");
				$("#cname").prev('.text-gray').fadeIn();
				$("#check_Ok_cname").fadeOut();
				
			}
			else if(!($("#cname").val().match(/^[a-z -]+$/i))){
				$("#cname").css("border-color", "#FF0003");
				$("#cname").next('.err_msg').fadeIn().text("Veuillez entrer un nom valide (pas de caractères spéciaux ni chiffres)");
				$("#cname").prev('.text-gray').fadeIn();
				$("#check_Ok_cname").fadeOut();
			}
			else{
				if($("#cname").val().length<=2){
					$("#cname").css("border-color", "#FF0003");
					$("#cname").next('.err_msg').fadeIn().text("le nom complet doit contenir au moins 3 caractères");
					$("#cname").prev('.text-gray').fadeIn();
					$("#check_Ok_cname").fadeOut();	
				}
				else{
					$("#cname").next('.err_msg').fadeOut().text("");
					$("#cname").prev('.text-gray').fadeOut();
					$("#check_Ok_cname").fadeIn();
					$("#cname").css("border-color", "#0C0");
					
				}	
			}
		});
		
		
		/* LIVE CHECK INPUT EMAIL IN REGFORM */
		$('#email_reg').blur(function(){
			if($("#email_reg").val() == null || $("#email_reg").val() == ''){
				$("#email_reg").css("border-color", "#FF0003");
				$("#email_reg").next('.err_msg').fadeIn().text("Veuillez entrer votre adresse email");
				$("#email_reg").prev('.text-gray').fadeIn();
				$("#check_Ok_email_reg").fadeOut();
			}
			else if(!($("#email_reg").val().match(/^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/))){
				$("#email_reg").css("border-color", "#FF0003");
				$("#email_reg").next('.err_msg').fadeIn().text("Adresse email invalide");
				$("#email_reg").prev('.text-gray').fadeIn();
				$("#check_Ok_email_reg").fadeOut();
			}
			else{
				$("#email_reg").next('.err_msg').fadeOut().text("");
				$("#email_reg").css("border-color", "#0C0");
				$("#email_reg").prev('.text-gray').fadeOut();
				$("#check_Ok_email_reg").fadeIn();
			}
		});
		
		/* LIVE CHECK INPUT LOGIN IN REGFORM */
		$('#login_reg').blur(function(){
			if($("#login_reg").val() == null || $("#login_reg").val() == ''){
				$("#login_reg").css("border-color", "#FF0003");
				$("#login_reg").next('.err_msg').fadeIn().text("Veuillez entrer votre identifiant");
				$("#login_reg").prev('.text-gray').fadeIn();
				$("#check_Ok_login_reg").fadeOut();
			}
			else if(!($("#login_reg").val().match(/^[a-z0-9._-]+$/i))){
				$("#login_reg").css("border-color", "#FF0003");
				$("#login_reg").next('.err_msg').fadeIn().html("Veuillez entrer un identifiant valide<br/>Pas de caractères spéciaux autres que . - ou _ ");
				$("#login_reg").prev('.text-gray').fadeIn();
				$("#check_Ok_login_reg").fadeOut();
			}
			else{
				if($("#login_reg").val().length<=4){
					$("#login_reg").css("border-color", "#FF0003");
					$("#login_reg").next('.err_msg').fadeIn().text("L'identifiant doit contenir au moins 4 caractères");
					$("#login_reg").prev('.text-gray').fadeIn();
					$("#check_Ok_login_reg").fadeOut();	
				}
				else{
					$("#login_reg").next('.err_msg').fadeOut().text("");
					$("#login_reg").css("border-color", "#0C0");
					$("#login_reg").prev('.text-gray').fadeOut();
					$("#check_Ok_login_reg").fadeIn();
				}	
			}
		});
		
		/* LIVE CHECK INPUT MDP1 IN REGFORM*/
		$('#mdp1').keyup(function(){
			if($("#mdp1").val() == null || $("#mdp1").val() == ''){
				$("#mdp1").css("border-color", "#FF0003");
				$("#mdp1").next('.err_msg').fadeIn().text("Veuillez entrer votre mot de passe");
				$("#show_mdp1").fadeIn();
				$("#check_Ok_mdp1").fadeOut();
				$("#show_mdp2").fadeIn();
				$("#check_Ok_mdp2").fadeOut();
			}
			else if(!($("#mdp1").val().match(/^[a-z0-9,:;()@!*._-éèöëùà]+$/i))){
				$("#mdp1").css("border-color", "#FF0003");
				$("#mdp1").next('.err_msg').fadeIn().html("Veuillez entrer un mot de passe valide<br/>Pas de caractères spéciaux autres que é è ö ë ù à , : ; ( ) @ ! * . _ - ");
				$("#show_mdp1").fadeIn();
				$("#check_Ok_mdp1").fadeOut();
				$("#show_mdp2").fadeIn();
				$("#check_Ok_mdp2").fadeOut();
			}
			else{
				if($("#mdp1").val().length<=5){
					$("#mdp1").css("border-color", "#FF0003");
					$("#mdp1").next('.err_msg').fadeIn().text("Le mot de passe doit contenir au moins 4 caractères");
					$("#show_mdp1").fadeIn();
					$("#check_Ok_mdp1").fadeOut();
					$("#show_mdp2").fadeIn();
					$("#check_Ok_mdp2").fadeOut();	
				}
				else{
					$("#mdp1").next('.err_msg').fadeOut().text("");
					$("#mdp1").css("border-color", "#0C0");
					mdp1_ok=true;
				}	
			}
			
		});
		
		/* LIVE CHECK INPUT MDP2 IN REGFORM*/
		$('#mdp2').keyup(function(){
			if($("#mdp2").val() != $("#mdp1").val()){
				$("#mdp2").css("border-color", "#FF0003");
				$("#mdp2").next('.err_msg').fadeIn().text("Ce mot de passe ne correspond pas au précedent");
				$("#show_mdp1").fadeIn();
				$("#check_Ok_mdp1").fadeOut();
				$("#show_mdp2").fadeIn();
				$("#check_Ok_mdp2").fadeOut();
			}
			else{
				if($("#mdp1").val()=='' || $("#mdp1").val()==null){
					$("#show_mdp1").fadeIn();
					$("#check_Ok_mdp1").fadeOut();
					$("#show_mdp2").fadeIn();
					$("#check_Ok_mdp2").fadeOut();
				}
				else{
					$("#mdp2").next('.err_msg').fadeOut().text("");
					$("#mdp2").css("border-color", "#0C0");
					$("#show_mdp1").fadeOut();
					$("#check_Ok_mdp1").fadeIn();
					$("#show_mdp2").fadeOut();
					$("#check_Ok_mdp2").fadeIn();	
				}	
			}
		});
		
		
		//VALIDATION DU FORMULAIRE REGISTRATION BOUTON "S'ENREGISTRER"
		$(document).on('click', '#reg-btn', function()
		{
			var mon_nom = $("#cname").val();
			var mon_mail = $("#email_reg").val();
			var mon_login = $("#login_reg").val();
			var mon_mdp1 = $("#mdp1").val();
			var mon_mdp2 = $("#mdp2").val();
						
			var valide_cname=false;
			var valide_email_reg=false; 
			var valide_login_reg=false;
			var valide_mdp1=false;
			var valide_mdp2=false; 
			
			//VERIF DES INPUTS ON REG-FORM SUBMIT
			//CHECK INPUT NOM COMPLET ON SUBMIT REG-FORM
			if($("#cname").val() == null || $("#cname").val() == ''){
				$("#cname").css("border-color", "#FF0003");
				$("#cname").next('.err_msg').fadeIn().text("Veuillez entrer votre nom.");
				valide_cname=false;
			}
			else if(!($("#cname").val().match(/^[a-z -éèöëùà]+$/i))){
				$("#cname").css("border-color", "#FF0003");
				$("#cname").next('.err_msg').fadeIn().text("Veuillez entrer un nom valide (pas de caractères spéciaux ni chiffres)");
				valide_cname=false;
				
			}
			else{
				if($("#cname").val().length<=2){
					$("#cname").css("border-color", "#FF0003");
					$("#cname").next('.err_msg').fadeIn().text("le nom complet doit contenir au moins 3 caractères");
					valide_cname=false;	
				}
				else{
					$("#cname").next('.err_msg').fadeOut().text("");
					$("#cname").css("border-color", "#0C0");
					var valide_cname=true;
				}	
			}
			
			//CHECK INPUT EMAIL ON SUBMIT REG-FORM
			if($("#email_reg").val() == null || $("#email_reg").val() == ''){
				$("#email_reg").css("border-color", "#FF0003");
				$("#email_reg").next('.err_msg').fadeIn().text("Veuillez entrer votre adresse email");
				valide_email_reg=false;
			}
			else if(!($("#email_reg").val().match(/^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/))){
				$("#email_reg").css("border-color", "#FF0003");
				$("#email_reg").next('.err_msg').fadeIn().text("Adresse email invalide");
				valide_email_reg=false;
			}
			else{
				$("#email_reg").next('.err_msg').fadeOut().text("");
				$("#email_reg").css("border-color", "#0C0");
				valide_email_reg=true;	
			}
			
			//CHECK INPUT LOGIN ON SUBMIT REG-FORM
			if($("#login_reg").val() == null || $("#login").val() == ''){
				$("#login_reg").css("border-color", "#FF0003");
				$("#login_reg").next('.err_msg').fadeIn().text("Veuillez entrer votre identifiant");
				valide_login_reg=false;
			}
			else if(!($("#login_reg").val().match(/^[a-z0-9._-]+$/i))){
				$("#login_reg").css("border-color", "#FF0003");
				$("#login_reg").next('.err_msg').fadeIn().html("Veuillez entrer un identifiant valide<br/>Pas de caractères spéciaux autres que . - ou _ ");
				valide_login_reg=false;
			}
			else{
				if($("#login_reg").val().length<=4){
					$("#login_reg").css("border-color", "#FF0003");
					$("#login_reg").next('.err_msg').fadeIn().text("L'identifiant doit contenir au moins 4 caractères");
					valide_login_reg=false;	
				}
				else{
					$("#login_reg").next('.err_msg').fadeOut().text("");
					$("#login_reg").css("border-color", "#0C0");
					var valide_login_reg=true;
				}	
			}
			
			//CHECK INPUT MDP1 ON SUBMIT REG-FORM
			if($("#mdp1").val() == null || $("#mdp1").val() == ''){
				$("#mdp1").css("border-color", "#FF0003");
				$("#mdp1").next('.err_msg').fadeIn().text("Veuillez entrer votre mot de passe");
				valide_mdp1=false;
			}
			else if(!($("#mdp1").val().match(/^[a-z0-9,:;()@!*._-éèöëùà]+$/i))){
				$("#mdp1").css("border-color", "#FF0003");
				$("#mdp1").next('.err_msg').fadeIn().html("Veuillez entrer un mot de passe valide<br/>Pas de caractères spéciaux autres que , : é è ö ë ù à ; ( ) @ ! * . _ - ");
				valide_mdp1=false;
			}
			else{
				if($("#mdp1").val().length<=5){
					$("#mdp1").css("border-color", "#FF0003");
					$("#mdp1").next('.err_msg').fadeIn().text("Le mot de passe doit contenir au moins 6 caractères");
					valide_mdp1=false;	
				}
				else{
					$("#mdp1").next('.err_msg').fadeOut().text("");
					$("#mdp1").css("border-color", "#0C0");
					var valide_mdp1=true;
				}	
			}
			
			//CHECK INPUT MDP2 ON SUBMIT REG-FORM
			if($("#mdp2").val() != $("#mdp1").val()){
				$("#mdp2").css("border-color", "#FF0003");
				$("#mdp2").next('.err_msg').fadeIn().text("Ce mot de passe ne correspond pas au précedent");
				valide_mdp2=false;
			}
			else{
				$("#mdp2").next('.err_msg').fadeOut().text("");
				$("#mdp2").css("border-color", "#0C0");
				var valide_mdp2=true;	
			}
			
			//CHAMPS CORRECTEMENT REMPLIS
			if(valide_cname && valide_email_reg && valide_login_reg && valide_mdp1 && valide_mdp2 && mon_mdp1==mon_mdp2){
				var data = 'cname='+mon_nom+'&email_reg='+mon_mail+'&login_reg='+mon_login+'&mdp1='+mon_mdp1+'&mdp2='+mon_mdp2;
				//var data = $(this).serialize();
				$.ajax({
					type : 'POST',
					url  : '../class/handlerRegistration.php',
					data : data,
					success :  function(data)
							   {						
									$("#reg-form").fadeOut(500).hide(function()
									{
										$(".login-box").fadeIn(500).show(function()
										{
											$("#reg-mess").html(data);
											if(data=="Cet email existe déjà<br/>"){
												$("#reg-form").fadeIn(500);
												$("#email_reg").prev('.text-gray').fadeIn();
												$("#check_Ok_email_reg").fadeOut();
												$("#mdp2").css("border-color", "#E5E5E5");
												$("#mdp1").css("border-color", "#E5E5E5");
												$("#cname").css("border-color", "#E5E5E5");
												$("#email_reg").css("border-color", "#FF0000");
												$("#login_reg").css("border-color", "#E5E5E5");
											}
											else if(data=="Cet identifiant existe déjà<br/>" || data=="Erreur! L'adresse email entrée n'existe pas<br/>"){
												$("#reg-form").fadeIn(500);
												$("#login_reg").prev('.text-gray').fadeIn();
												$("#check_Ok_login_reg").fadeOut();
												$("#mdp2").css("border-color", "#E5E5E5");
												$("#mdp1").css("border-color", "#E5E5E5");
												$("#cname").css("border-color", "#E5E5E5");
												$("#email_reg").css("border-color", "#E5E5E5");
												$("#login_reg").css("border-color", "#FF0000");
											}
											else{
												$("#reg-form").trigger("reset");
												$("#show_mdp1").fadeIn();
												$("#check_Ok_mdp1").fadeOut();
												$("#show_mdp2").fadeIn();
												$("#check_Ok_mdp2").fadeOut();
												$("#cname").prev('.text-gray').fadeIn();
												$("#check_Ok_cname").fadeOut();
												$("#email_reg").prev('.text-gray').fadeIn();
												$("#check_Ok_email_reg").fadeOut();
												$("#login_reg").prev('.text-gray').fadeIn();
												$("#check_Ok_login_reg").fadeOut();
												$("#mdp2").css("border-color", "#E5E5E5");
												$("#mdp1").css("border-color", "#E5E5E5");
												$("#cname").css("border-color", "#E5E5E5");
												$("#email_reg").css("border-color", "#E5E5E5");
												$("#login_reg").css("border-color", "#E5E5E5");
											}
										});
									});
								}
				});
				return false;	
			}
			else{
				$("#reg-mess").fadeIn().html('<font color="#CC0000">Assurer que les champs marqués en rouge soient correctement remplis.</font>');
				
				if(!valide_cname){
					$("#cname").css("border-color", "#FF0003");
				}
				if(!valide_email_reg){
					$("#email_reg").css("border-color", "#FF0003");
				}
				if(!valide_login_reg){
					$("#login_reg").css("border-color", "#FF0003");
				}
				if(!valide_mdp1){
					$("#mdp1").css("border-color", "#FF0003");
				}
				if(!valide_mdp2){
					$("#mdp2").css("border-color", "#FF0003");
				}
				
				if(mon_mdp1!=mon_mdp2){
					$("#mdp1").css("border-color", "#FF0003");
					$("#mdp1").next('.err_msg').fadeIn().text("Ce mot de passe ne correspond pas au suivant. Entrer le à nouveau.");
					$("#mdp2").css("border-color", "#FF0003");
					$("#mdp2").next('.err_msg').fadeIn().text("Ce mot de passe ne correspond pas au précedent. Entrer le à nouveau.");
				}
			}
		});
		/************************************ FIN SECTION REGISTRATION FORM ********************************************/
		
	});
	</script>
    
  </body>
</html>