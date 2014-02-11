<?php
	require_once("config.php");
	$db = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	if (mysqli_connect_errno()) {
		echo "Connection failed: ". mysqli_connect_error();
		exit();
	}
	$id = $_GET["id"];
	$sql = "SELECT title, content, userID FROM pages WHERE pageID={$id} LIMIT 1";
	
	if($result = $db->query($sql)) {
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
		
		$result->close();
		include ('footer.php');
	} else {
		echo "Query: {$sql} failed";
	}
	
	$db->close();
	
	
?>