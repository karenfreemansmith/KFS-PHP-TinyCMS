<?php
	require_once("session.php");
	require_once("functions.php");
	$db = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	if (mysqli_connect_errno()) {
		echo "Connection failed: ". mysqli_connect_error();
		exit();
	}
	include('header.php');
	echo "<nav style='text-align:right'>";
	if(!$session->is_logged_in()) {
		echo "<a href='register.php'>Register</a> | <a href='login.php'>Login</a>";
	} else {
		echo "<a href='logout.php'>Logout</a>";
	}
	echo "</nav>";
	$sql = "SELECT description FROM users WHERE uid=1";
	// Shows primary site description
	if($result = $db->query($sql)) {
		$row=$result->fetch_assoc();
		$frontpage= $row['description'];
		echo "<div class='col-sm-9'><hr />{$frontpage}<hr /></div>";

	} else {
		echo "Query: {$sql} failed";
	}
	echo "<div class='col-sm-3'>";
	$sql = "SELECT pageID, title FROM pages WHERE userID=1";
	// Shows additional site-wide pages 
	if($result = $db->query($sql)) {
		echo "<h3>Website Links</h3>";
		while($row=$result->fetch_assoc()) {
			echo "<strong><a href='page.php?id=";
			echo $row['pageID'];
			echo "'>";
			echo $row['title'];
			echo "</a></strong><br />";
		}

	} else {
		echo "Query: {$sql} failed";
	}
	
	$sql = "SELECT uid, username FROM users WHERE uid>1";
	// Shows user directory
		echo "<hr /><h3>Current User Pages:</h3>";
		if($result = $db->query($sql)) {
		while($row=$result->fetch_assoc()) {
			echo "<strong><a href='site.php?id=";
			echo $row['uid'];
			echo "'>";
			echo $row['username'];
			echo "</a></strong><br />";
		}
	} else {
		echo "Query: {$sql} failed";
	}
	echo "</div>";
	include ('footer.php');


	$db->close();
?>