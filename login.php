<?php
	require_once("config.php");
	require_once("session.php");

	if($session->is_logged_in()) { 
		if($_SESSION['user_id']==1) {
			header("Location: user_admin.php"); 
		} else {
		$id = $_SESSION['user_id'];
		//exit();
			header("Location: page_admin.php?id={$id}");
		}
	} 

	if(isset($_POST['un'])) {
		$un=trim($_POST['un']);
		$pw=trim($_POST['pw']);
		$db = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
		if (mysqli_connect_errno()) {
			echo "Connection failed: ". mysqli_connect_error();
			exit();
		}
		$sql = "SELECT uid FROM users WHERE username='{$un}' AND password='{$pw}' LIMIT 1";
		
		if($result = $db->query($sql)) {
			$row=$result->fetch_assoc();
			$validID = $row['uid'];
		} else {
			echo "query {$sql} failed";
		}
		}
	$error_msg="";
	if(isset($validID)) {
		$session->login($validID);
		header("Location: page_admin.php?id=$validID");
	} else {
		$error_msg= "Username and password not found<br />";
	}
	
	include('header.php');
	
	$un="";
	$pw="";
	echo $error_msg;
	echo "<form action='login.php' method='post'>";
	echo "<p>Username: <input type='text' name='un' value='" . htmlentities($un) . "'></p>";
	echo "<p>Password: <input type='password' name='pw' value='" .htmlentities($pw) . "'></p>";
	echo "<p><input type='submit' value='login'></p>";
	echo "</form>";
	include('footer.php');
	
?>