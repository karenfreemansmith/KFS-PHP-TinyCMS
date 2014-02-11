<?php
	require_once("functions.php");

	$id = $_GET["id"];
	include('header.php');
	echo "<div class='col-sm-9'>";

	$result=runSQL("SELECT username, sitename, description FROM users WHERE uid={$id}");
	if($result) {
		$row=$result->fetch_assoc();
		$username = $row['username'];
		$sitetitle = $row['sitename'];
		$frontpage= $row['description'];
		echo "<hr />";
		echo "<h3 style='text-align:center;'>{$sitetitle}</h3>";
		echo "{$frontpage}";
	} 
	echo "</div>";
	
	echo "<div class='col-sm-3'><h3>My Pages</h3>";
	$result=runSQL("SELECT pageID, title FROM pages WHERE userID={$id}");
	if($result) {
		while($row=$result->fetch_assoc()) {
			echo "<strong><a href='page.php?id=";
			echo $row['pageID'];
			echo "'>";
			echo $row['title'];
			echo "</a></strong><br />";
		}
		$result->close();
	} 
	echo "</div>";
	include ('footer.php');
	
?>