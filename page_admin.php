<?php
	require_once("session.php");
	require_once("functions.php");

	if(isset($_GET['id'])) {
		$id = $_GET["id"];
	} else {
		header("Location: login.php");
	}
	
	$sql = "SELECT username, sitename, description FROM users WHERE uid={$id}";
	if($result = runSQL($sql)) {
		$row=$result->fetch_assoc();
		$username = $row['username'];
		$sitename = $row['sitename'];
		$description= $row['description'];
		include('header.php');
		echo "<hr /><h3 style='text-align:center;'>{$sitename}</h3><hr />";
		echo "<div class='col-sm-9'>";
		echo "{$description}";
		echo "<p style='text-align:right;'><a href='user_edit.php?id={$id}'>edit</a></p>";
	} else {
		echo "Query: {$sql} failed";
	}
	echo "</div><div class='col-sm-3'><h3>My Pages</h3>";

	if($result = listPages($id)) {
		while($row=$result->fetch_assoc()) {
			echo "<strong><a href='page_edit.php?id=";
			echo $row['pageID'];
			echo "'>";
			echo $row['title'];
			echo "</a></strong><br />";
		}
	} else {
		echo "Query: {$sql} failed";
	}

	echo "<p style='text-align:right;'><a href='page_add.php?uid={$id}&pid=0'>add page</a></p>";
	echo "</div>";
	include ('footer.php');
?>