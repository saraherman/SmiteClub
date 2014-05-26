<!DOCTYPE html>
<?php

// Inialize session
session_start();
$url= $_SESSION['url'];

if (isset($_SESSION['user']) && isset($_SESSION['id'])) {
	$edit_id= $_SESSION['id'];
	header('Location: update.php?id=$edit_id');
}
elseif (isset($_SESSION['user'])) {
	
	header('Location: $url');
}

?>
<html>
<head>
	<title>login</title>
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
					<form class="search" method="post" action="searchpage.php">
							<input type="text" name="search" placeholder="Search SmiteClub">
							<input type="submit" value="">
						</form>
					<div class="login-border"></div>
					<div class="login">
						
						<form class="login" method="post" action="">
							<?php
						$con = mysqli_connect("localhost","root","011792","thoth");
							if (!$con)
							{
								die('Could not connect: ' . mysql_error());
							}

						if($_SERVER['REQUEST_METHOD'] == "POST") {
							$user = $_REQUEST['username'];
							$pass = $_REQUEST['password'];
							$user = stripslashes($user);
							$pass = stripslashes($pass);
							$user = mysql_real_escape_string($user);
							$pass = mysql_real_escape_string($pass);
							$hash = crypt($pass, "thoth");

							$found = false;


						$result = mysqli_query($con, 'SELECT * FROM admin where username = "'.$user.'" && password = "'.$hash.'"');
						

						while($row = mysqli_fetch_array($result)) {
									$found = true;
								}
						if($found == true){
							$_SESSION['user']=$user;
							if (isset($_REQUEST['id'])) {
								$edit_id= $_REQUEST['id'];
								$id = "update.php?id=".$edit_id;
								header('Location: '.$id);
							}

							header("Location: $url");
							echo "<p style='display:inline-block;'>You have been logged in.</p>";
						}
						else{
							
							echo "<p style='display:inline-block;'>Invalid username or password.</p>";
						}
					}
					?>
							<h2>Login</h2>
							<input type="text" name="username" placeholder="username" required>
							<input type="password" name="password" placeholder="password" required>
							<input type="submit" value="Login"><br>
							<p>Don't have an account? <a href="register.php">Register</a></p>
						</form>

						
					</div>
					<div class="login-border"></div>
				</div>
			</div>
		</div>

		<?php include "footer.php"; ?>