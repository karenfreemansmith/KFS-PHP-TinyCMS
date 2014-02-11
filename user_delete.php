<?php
	require_once("config.php");
	$db = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	if (mysqli_connect_errno()) {
		echo "Connection failed: ". mysqli_connect_error();
		exit();
	}
	$id = $_GET["id"];
	$sql = "DELETE FROM pages WHERE userID={$id}";
	
	if($result = $db->query($sql)) {
		$sql = "DELETE FROM users WHERE uid={$id}";
		if($result = $db->query($sql)) {
			header("Location:index.php");
		} else {
			echo "Query: {$sql} failed";
		}
	} else {
		echo "Query: {$sql} failed";
	}
	
?>