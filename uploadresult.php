<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8"/>
	<title>Formula 1 - Fan Center</title>
	<link rel="stylesheet" href="styles.css" type="text/css"/>
	<link href='https://fonts.googleapis.com/css?family=Ubuntu+Condensed&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
</head>
<body>
	<div id="container">
		<div id="logo">
			FORMULA 1 Season 2019
		</div>
		
		<div id="menu">
			<a href="home.html"><div class="option">Home</div></a>
			<a href="photos.html"><div class="option">Photos</div></a>
			<a href="howtowatch.html"><div class="option">How to watch?</div></a>
			<a href="upload.php"><div class="option">Upload a photo</div></a>
			<a href="darkmode.html"><div class="option">Test dark mode</div></a>
			<a href="standings.php"><div class="option">Standings</div></a>
			<a href="contact.html"><div class="option">Contact</div></a>
			<div style="clear:both;"></div>
		</div>
		
		<div id="topbar"> 
			<div id="topbar2">
				<h3>Upload a photo</h3>
				Submit a photo to get featured!
			</div>
			<div style="clear:both;"></div>
		</div>
		<div id="container2">
		<div class="content">
		<h1>Uploaded photo result</h1>
		<br />
		<?php
			$target_dir = "uploads/";
			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			if (isset($_POST["username"])) $username = $_POST['username'];
			if (isset($_POST["email"])) $email = $_POST['email'];
			if (isset($_POST["race"])) $race = $_POST['race'];
			if (!isset($_POST['checkrules']))
			{
				Header("Location: upload.php?checkrules=0");
			}
			if (ctype_alnum($username)==false)
			{
				Header("Location: upload.php?username=0");
			}
			$emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
			if ((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$email))
			{
				Header("Location: upload.php?email=0");
			}


				if ((move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)))
				{
					echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded." . "<br/><br/>";
					echo "Username: " .$username . "<br/><br/>";
					echo "Email: " .$email . "<br/><br/>";
					echo "Race: " .$race ;
				} 
				else 
				{
					echo "Sorry, there was an error uploading your file.";
				}
		?><br/><br/>
		</div>
		<div style="clear:both;"></div>
		</div>
	
		<div id="footer">
				Content source: <a href="https://www.reddit.com/r/formula1/">Reddit Formula 1  r/formula1</a>
				<br />
				F1 fan center &copy; - not asosciated with F1 or FOM
		</div>
	</div>
</body>
</html>