<?php
	require_once("config.php");
	// if a form was submitted, update page
	if (isset($_POST['un']) && isset($_POST['pw'])) {
		$username=addslashes($_POST['un']);
		$password=addslashes($_POST['pw']);
		$sitename=addslashes($_POST['sitename']);
		$description=addslashes($_POST['description']);
		$db = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
		if (mysqli_connect_errno()) {
			echo "Connection failed: ". mysqli_connect_error();
			exit();
		}
		$sql = "INSERT INTO users (username, password, sitename, description) VALUES ('{$username}', '{$password}', '{$sitename}', '{$description}')";
		$result = $db->query($sql);		
		$db->close();
		header("Location: page_admin.php");
	} else {
		include ('header.php');
		// display form to add new page
		echo "<hr /><p style='text-align:right;'>";
		echo "<a href='user_list.php'>view all</a> ";
		echo "</p><hr />";
		echo "<form method='post' action='register.php'>";
		echo "<p>Website Name:<br /><input type='text' size=77 name='sitename'></p>";
		echo "<p>Website Description: (this text will appear on your front page)<br /><textarea cols=80 rows=10 name='description'></textarea></p>";
		echo "<p>Username: <input type='text' size=20 name='un' value=''>";
		echo "Password: <input type='password' size=20 name='pw' value=''></p>";
		echo "<p style='text-align:center;'><input type='submit' value='Create My Site'></p></form>";
		include ('footer.php');
	}	
	
?>