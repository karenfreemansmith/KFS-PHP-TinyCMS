<?php
	require_once("config.php");
	require_once("session.php");
	if(!$session->is_logged_in()) { 
		header("Location: login.php"); }
	if($_SESSION['user_id']!=1) { 
		header("Location: page_admin.php?id={$_SESSION['user_id']}");}
	$db = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	if (mysqli_connect_errno()) {
		echo "Connection failed: ". mysqli_connect_error();
		exit();
	}
	
	$sql = "SELECT uid, username FROM users";
	
	if($result = $db->query($sql)) {
		include('header.php');
		echo "<hr /><p style='text-align:right;'>";
		echo "<a href='registr.php'>add new</a> ";
		echo "</p><hr />";
	
		while($row=$result->fetch_assoc()) {
			echo "<strong><a href='user_edit.php?id=";
			echo $row['uid'];
			echo "'>";
			echo $row['username'];
			echo "</a></strong><br />";
		}
		$result->close();
		include('footer.php');
	} else {
		echo "Query: {$sql} failed";
	}
	
	$db->close();
	
	
?>