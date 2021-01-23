<?php
//Error Reporting
ini_set('display_errors' , 'On');
error_reporting(E_ALL);

	include 'admin/connect.php';
	$sessionUser ='';
<<<<<<< HEAD
	if(isset($_SESSION['user'])) {
=======
	if(isset($_SESSION['user'];)) {
>>>>>>> eda3cc6c901deba950efdcf240e66b2a4d74ea58
		$sessionUser = $_SESSION['user'];


	}

	//Routes

	$tpl = 'includes/templates/';
	$lang = 'includes/languages/';
	$func = 'includes/functions/';
	$css = 'layout/css/';
	$js = 'layout/js/';
	


	//include important files

	include $func . 'functions.php';
	include $lang . 'english.php';
	include $tpl . 'header.php'; 
	
	
	 ?>

