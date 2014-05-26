<!DOCTYPE html>
<?php

// Inialize session
session_start();
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
?>
<html>
<head>
	<title>Home</title>
	<?php include 'header.php'; ?>

		<?php 
		
			$con = mysqli_connect("localhost","root","011792","thoth");
				if (!$con)
				{
					die('Could not connect: ' . mysql_error());
				}

				$result =mysqli_query($con, "SELECT * FROM gods WHERE name like 'thanatos'");
				$row = mysqli_fetch_array($result);
		 		
		?>

		<div class="content">
			<div class="container">
				<div class="profile">
					<div class="login-border"></div>
						<form class="search" method="post" action="searchpage.php">
							<input type="text" name="search" placeholder="Search SmiteClub">
							<input type="submit" value="">
						</form>
					<div class="one-third">
						
						<!-- large picture -->
						<?php echo '<img src="'.$row['largepic'].'" class="largepic" alt="'.$row['name'].'">'; ?>
						
					</div>
					<div class="information">
						<!-- name -->
						<?php echo '<h1 class="cap">'.$row['name'].'</h1>';?>

						<!-- title -->
						<?php echo '<h2 class="cap">'.$row['title'].'</h2>';?>

						<!-- pantheon -->
						<?php echo'<h3 class="allcap">'.$row['pantheon'].'</h3>';?>

						
					</div>
					<div class="one-third">
						
						<!-- small god pic -->
						<?php
							echo '<div class="god-container">
							<img src="'.$row['smallpic'].'" alt="'.$row['name'].'"><a href="profile.php?id='.$row['id'].'"><div class="god-frame"></div></a>
						</div>';
						?>

					</div>
					<!-- description -->
					<?php echo '<p class="description">'.$row['description'].'</p>';?>
					<div class="login-border"></div>
				</div>
			</div>
		</div>

		<?php include "footer.php"; ?>