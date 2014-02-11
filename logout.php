<?php
	require_once("session.php");
	
	if($session->is_logged_in()) { 
		$session->logout();
	}
		header("Location: index.php"); 
?>