<?php
	require_once("session.php");
	require_once("functions.php");

	// if a form was submitted, update page
	if (isset($_POST['title']) && isset($_POST['content'])) {
		$title=addslashes($_POST['title']);
		$content=addslashes($_POST['content']);
		$id=$_POST['id'];
		updatePage($id, $title, $content);
		header("Location: page_edit.php?id={$id}");
	} else {
		// display form with current page information
		if (isset($_GET["id"])) {
			$id = $_GET["id"];
			$result = runSQL("SELECT title, content, userID FROM pages WHERE pageID={$id} LIMIT 1");
			if($result) {
				include ('header.php');			
				while($row=$result->fetch_assoc()) {
					$uid=$row['userID'];
					echo "<hr /><p style='text-align:right;'>";
					echo "<a href='page_admin.php'>view all</a> | ";
					echo "<a href='page_add.php?pid={$id}&uid={$uid}'>add child</a> | ";
					echo "<a href='page_delete.php?id={$id}'>delete page</a> |";
					echo "<a href='logout.php'>logout</a></p><hr />";
					echo "<form method='post' action='page_edit.php'>";
					echo "<p>Title:  <input type='text' size=55	name='title' value='";
					echo $row['title'];
					echo "'><input type='submit' value='Update Page'></p>";
					echo "<p>Content:<br /><textarea name='content' rows=10 cols=60>";
					echo $row['content'];
					echo "</textarea><input type='hidden' name='id' value={$id}></form>";
				}
				
				$result->close();
				include('footer.php');
			} else {
				echo "Query: {$sql} failed";
			}
		}

	}

	
	
?>