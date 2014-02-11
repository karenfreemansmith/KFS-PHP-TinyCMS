<?php
	require_once("config.php");
	$db = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	if (mysqli_connect_errno()) {
		echo "Connection failed: ". mysqli_connect_error();
		exit();
	}
	$id = $_GET["id"];
	include('header.php');
	echo "<div class='col-sm-9'>";

	$sql = "SELECT username, sitename, description FROM users WHERE uid={$id}";
	if($result = $db->query($sql)) {
		$row=$result->fetch_assoc();
		$username = $row['username'];
		$sitetitle = $row['sitename'];
		$frontpage= $row['description'];
		echo "<hr />";
		echo "<h3 style='text-align:center;'>{$sitetitle}</h3>";
		echo "{$frontpage}";
	} else {
		echo "Query: {$sql} failed";
	}
	echo "</div>";
	
	echo "<div class='col-sm-3'><h3>My Pages</h3>";
	$sql = "SELECT pageID, title FROM pages WHERE userID={$id}";
	if($result = $db->query($sql)) {
		while($row=$result->fetch_assoc()) {
			echo "<strong><a href='page.php?id=";
			echo $row['pageID'];
			echo "'>";
			echo $row['title'];
			echo "</a></strong><br />";
		}
		$result->close();
	} else {
		echo "Query: {$sql} failed";
	}
	echo "</div>";
	include ('footer.php');
	$db->close();
	
	
?>