<?php

	$host = "localhost";
	$user = "root";
	$password = "";
	$database = "baza";

	$id = "";
	$number = "";
	$name = "";
	$surname = "";
	$teamid = "";
	$idteam = "";
	$nameteam = "";
	$countryteam = "";
	$idstanding = "";
	$pointsstanding = "";

	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

	try
	{
		$connect = mysqli_connect($host, $user, $password, $database);
	}
	catch (Exception $exception)
	{
		echo 'Error';
	}

	function getPosts()
	{
		$posts = array();
		$posts[0] = $_POST['id'];
		$posts[1] = $_POST['number'];
		$posts[2] = $_POST['name'];
		$posts[3] = $_POST['surname'];
		$posts[4] = $_POST['teamid'];
		return $posts;
	}

	function getPosts2()
	{
		$posts = array();
		$posts[0] = $_POST['idteam'];
		$posts[1] = $_POST['nameteam'];
		$posts[2] = $_POST['countryteam'];
		return $posts;
	}

	function getPosts3()
	{
		$posts = array();
		$posts[0] = $_POST['idstanding'];
		$posts[1] = $_POST['pointsstanding'];
		return $posts;
	}

?>

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
				<h3>Update Database</h3>
				Insert or delete data!
			</div>
			<div style="clear:both;"></div>
		</div>
		<div id="container2">
		<div class="content">
		<h1>Drivers table</h1>
		<?php
		if (isset($_POST['insert']))
		{
			$data = getPosts();
			$insert_Query = "INSERT INTO `drivers` (`id`, `nr`, `name`, `surname`, `team_id`) VALUES ('$data[0]', '$data[1]', '$data[2]', '$data[3]', '$data[4]')";

			try
			{
				$insert_Result = mysqli_query($connect, $insert_Query);

				if ($insert_Result)
				{
					if (mysqli_affected_rows($connect) > 0)
					{
						echo "Data Inserted";
					}
					else
					{
						echo "Data Not Inserted";
					}
				}
			}
			catch (Exception $exception)
			{
				echo "Error while inserting values ".$exception->getMessage();
			}
		}

		if (isset($_POST['delete']))
		{
			$data = getPosts();
			$delete_Query = "DELETE FROM `drivers` WHERE `id` = '$data[0]'";

			try
			{
				$delete_Result = mysqli_query($connect, $delete_Query);

				if ($delete_Result)
				{
					if (mysqli_affected_rows($connect) > 0)
					{
						echo "Data Deleted";
					}
					else
					{
						echo "Data Not Deleted";
					}
				}
			}
			catch (Exception $exception)
			{
				echo "Error while deleting values ".$exception->getMessage();
			}
		}
?>
		<br/><br/>
		<form action="standings.php" method="post">
			<input type="number" name="id" placeholder="ID" value="<?php echo $id;?>"><br/><br/>
			<input type="number" name="number" placeholder="Number" value="<?php echo $number;?>"><br/><br/>
			<input type="text" name="name" placeholder="Name" value="<?php echo $name;?>"><br/><br/>
			<input type="text" name="surname" placeholder="Surname" value="<?php echo $surname;?>"><br/><br/>
			<input type="number" name="teamid" placeholder="Team ID" value="<?php echo $teamid;?>"><br/><br/>
			<div>
				<input type="submit" name="insert" value="Insert">
				<input type="submit" name="delete" value="Delete">
			</div>
		</form>
		<br/><br/>
		<h1>Teams table</h1>
		<?php
		if (isset($_POST['insertteam']))
		{
			$data = getPosts2();
			$insert_Query = "INSERT INTO `teams` (`id`, `name`, `country`) VALUES ('$data[0]', '$data[1]', '$data[2]')";

			try
			{
				$insert_Result = mysqli_query($connect, $insert_Query);

				if ($insert_Result)
				{
					if (mysqli_affected_rows($connect) > 0)
					{
						echo "Data Inserted";
					}
					else
					{
						echo "Data Not Inserted";
					}
				}
			}
			catch (Exception $exception)
			{
				echo "Error while inserting values ".$exception->getMessage();
			}
		}

		if (isset($_POST['deleteteam']))
		{
			$data = getPosts2();
			$delete_Query = "DELETE FROM `teams` WHERE `id` = '$data[0]'";

			try
			{
				$delete_Result = mysqli_query($connect, $delete_Query);

				if ($delete_Result)
				{
					if (mysqli_affected_rows($connect) > 0)
					{
						echo "Data Deleted";
					}
					else
					{
						echo "Data Not Deleted";
					}
				}
			}
			catch (Exception $exception)
			{
				echo "Error while deleting values ".$exception->getMessage();
			}
		}
?>
		<br/><br/>
		<form action="standings.php" method="post">
			<input type="number" name="idteam" placeholder="Team ID" value="<?php echo $idteam;?>"><br/><br/>
			<input type="text" name="nameteam" placeholder="Team name" value="<?php echo $nameteam;?>"><br/><br/>
			<input type="text" name="countryteam" placeholder="Team country" value="<?php echo $nameteam;?>"><br/><br/>
			<div>
				<input type="submit" name="insertteam" value="Insert">
				<input type="submit" name="deleteteam" value="Delete">
			</div>
		</form>
		<br/><br/>
		<h1>Drivers standing table</h1>
		<?php
		if (isset($_POST['insertstanding']))
		{
			$data = getPosts3();
			$insert_Query = "INSERT INTO `drivers_standings` (`driver_id`, `points`) VALUES ('$data[0]', '$data[1]')";

			try
			{
				$insert_Result = mysqli_query($connect, $insert_Query);

				if ($insert_Result)
				{
					if (mysqli_affected_rows($connect) > 0)
					{
						echo "Data Inserted";
					}
					else
					{
						echo "Data Not Inserted";
					}
				}
			}
			catch (Exception $exception)
			{
				echo "Error while inserting values ".$exception->getMessage();
			}
		}

		if (isset($_POST['deletestanding']))
		{
			$data = getPosts3();
			$delete_Query = "DELETE FROM `drivers_standings` WHERE `driver_id` = '$data[0]'";

			try
			{
				$delete_Result = mysqli_query($connect, $delete_Query);

				if ($delete_Result)
				{
					if (mysqli_affected_rows($connect) > 0)
					{
						echo "Data Deleted";
					}
					else
					{
						echo "Data Not Deleted";
					}
				}
			}
			catch (Exception $exception)
			{
				echo "Error while deleting values ".$exception->getMessage();
			}
		}
?>
		<br/><br/>
		<form action="standings.php" method="post">
			<input type="number" name="idstanding" placeholder="Driver ID" value="<?php echo $idstanding;?>"><br/><br/>
			<input type="number" name="pointsstanding" placeholder="Points" value="<?php echo $pointsstanding;?>"><br/><br/>

			<div>
				<input type="submit" name="insertstanding" value="Insert">
				<input type="submit" name="deletestanding" value="Delete">
			</div>
		</form>
		<br/><br/>
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