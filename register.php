<!DOCTYPE html>
<?php

// Inialize session
session_start();

// Check, if username session is NOT set then this page will jump to login page
if (isset($_SESSION['user'])) {
	header('Location: index.php');
}
?>
<html>
<head>
	<title>Register New Admin</title>
	<?php include 'header.php'; ?>
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


						$result = mysqli_query($con, 'SELECT * FROM admin where username = "'.$user.'"');
						

						while($row = mysqli_fetch_array($result)) {
									$found = true;
								}
						if($found == true){
							echo "<p style='display:inline-block;'>There is already an account with this username. Try again.</p>";
						}
						else{
							
							mysqli_query($con, "INSERT INTO admin (username, password) VALUES ('".$user."', '".$hash."')");						
							echo "<p style='display:inline-block;'>You have successfully registered the username ".$user.".</p>";
						}
					}
					?>
							<h2>Register</h2>
							<input type="text" name="username" placeholder="username" required>
							<input type="password" name="password" placeholder="password" required>
							<input type="submit" value="create"><br>
							<p>Already have an account? <a href="login.php">Login</a></p>
						</form>
					</div>
					<div class="login-border"></div>
				</div>
			</div>
		</div>

		<?php include "footer.php"; ?>