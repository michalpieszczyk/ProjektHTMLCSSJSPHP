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
		<h1>Upload photo form</h1>
		<?php 
			if ((isset($_GET['checkrules'])) && ($_GET['checkrules'] == 0)) echo "You have to accept the rules before posting!<br/>";
			if ((isset($_GET['username'])) && ($_GET['username'] == 0)) echo "Username can contain only letter and numbers!<br/>";
			if ((isset($_GET['email'])) && ($_GET['email'] == 0)) echo "Invalid email!<br/>";
		?>
		<br />
		<form action="uploadresult.php" method="post" enctype="multipart/form-data">
			Username: <br/> <input type="text" name="username"/><br/>
			Email: <br/> <input type="email" name="email"/><br/>
			Race: <br/> 
			<input list="race" name="race">
			<datalist id="race">
			<option value="Australia GP 2019">
			<option value="Bahrain GP 2019">
			<option value="China GP 2019">
			<option value="Baku GP 2019">
			</datalist><br/><br/>
			<input type="file" name="fileToUpload" id="fileToUpload"><br/><br/>
			<label>
			<input type="checkbox" name="checkrules"/> I accept the rules.<br/><br/>
			<input type="submit">
			</label>
		</form>	
		
		
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