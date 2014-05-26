<!DOCTYPE html>
<?php

// Inialize session
session_start();
	$_SESSION['url'] = $_SERVER['REQUEST_URI'];
?>
<html>
<head>
	<title>God Profile</title>
	<?php include 'header.php'; ?>

		<?php 
			$con = mysqli_connect("localhost","root","011792","thoth");
				if (!$con)
				{
					die('Could not connect: ' . mysql_error());
				}


				if (isset($_REQUEST['id'])) {
					$id = $_REQUEST['id'];
				}
				else{
					$id="null";
				}

				$result =mysqli_query($con, "SELECT * FROM gods WHERE id='".$id."'");
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
					<div class="gods">
						
						<!-- large picture -->
						<?php echo '<img src="'.$row['largepic'].'" class="largepic" alt="'.$row['name'].'">'; ?>
						
					
						<div class="information">
							<!-- name -->
							<?php echo '<h1 class="cap">'.$row['name'].'</h1>';?>

							<!-- title -->
							<?php echo '<h2 class="cap">'.$row['title'].'</h2>';?>

							<!-- pantheon -->
							<?php echo'<h3 class="allcap">'.$row['pantheon'].'</h3>';?>
							<?php
								if (!isset($_SESSION['user'])) {
									$_SESSION['id']=$row['id'];
									echo "<p><a href='login.php?id=".$row['id']."'>Edit</a></p>";
								}
								else{
									echo "<p><a href='update.php?id=".$row['id']."'>Edit</a></p>";
								}

							?>
							
						</div>
					
						
						
					
					<!-- description -->
					<?php echo '<p class="description">'.$row['description'].'</p>';?>
					</div>
					
					<div class="login-border"></div>
				</div>
			</div>
		</div>

				<?php include "footer.php"; ?>