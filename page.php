<?php
	require_once("functions.php");

	$id = $_GET["id"];
	$result=runSQL("SELECT title, content, userID FROM pages WHERE pageID={$id} LIMIT 1");
	
	if($result) {
		include('header.php');
		while($row=$result->fetch_assoc()) {
			$uid=$row['userID'];
			echo "<p style='text-align:right;'>";
			echo "<a href='site.php?id={$uid}'>home</a>";
			echo "</p><hr />";
			echo "<h3>";
			echo $row['title'];
			echo "</h3>";
			echo $row['content'];
		}
		include ('footer.php');
	} 
?>