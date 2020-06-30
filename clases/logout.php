<?php 

	include_once 'UserSession.php';


	$userSession = new UserSession();
	$userSession->closeSession();

	header("location: ../index.php");



 ?>