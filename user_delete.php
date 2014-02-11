<?php
	require_once("session.php");
	require_once("functions.php");

	$id = $_GET["id"];
	deleteSite($id);
	header("Location:index.php");

	
?>