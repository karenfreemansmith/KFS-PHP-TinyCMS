<?php
	require_once("session.php");
	require_once("functions.php");

	// if a form was submitted, update page
	if (isset($_POST['content'])) {
		$sitetitle=addslashes($_POST['sitename']);
		$content=addslashes($_POST['content']);
		$id=$_POST['uid'];
		
		if(updateSite($id, $sitetitle, $content)) {
			$page="page_admin.php?id={$id}";
			header("Location: {$page}");
		} 
	} else {
		// display form with current page information
		if (isset($_GET["id"])) {
			$id = $_GET["id"];
			$result = runSQL("SELECT * FROM users WHERE uid={$id} LIMIT 1");
			if($result) {
				include ('header.php');			
				while($row=$result->fetch_assoc()) {
					$title=$row['sitename'];
					$description=$row['description'];
					$uid=$id;
					$username=$row['username'];
					$password=$row['password'];
					echo "<hr /><p style='text-align:right;'>";
					echo "<a href='site_admin.php'>view</a> | ";
					echo "<a href='page_add.php'>add new page</a> | ";
					echo "<a href='user_delete.php?id={$id}'>delete site</a> ";
					echo "</p><hr />";
					echo "<form method='post' action='user_edit.php'>";
					echo "<p>Website Name: <br /><input type='text' name='sitename' size=57 value='{$title}'></p>";
					echo "<p>Front Page Text:<br />";
					echo "<textarea name='content' rows=10 cols=60>{$description}</textarea>";
					echo "<input type='hidden' name='uid' value={$uid}>";
					echo "<p style='text-align:center;'><input type='submit' value='Update My Site'></p></form>";
				}

				include('footer.php');
			} 
		}
	}

	
	
?>