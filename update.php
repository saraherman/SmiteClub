<?php

// Inialize session
session_start();
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
$url=$_SESSION['url'];
$id = $_SESSION['id'];

// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['user'])) {
	header('Location: login.php');
}
else{

}
?>
<html>
<head>
	<title>Change a God</title>
	<?php include 'header.php'; ?>

		

		<div class="content">
			<div class="container">
				<div class="profile">
					<form class="search" method="post" action="searchpage.php">
							<input type="text" name="search" placeholder="Search SmiteClub">
							<input type="submit" value="">
						</form>
					<div class="login-border"></div>
					<?php 
							$con = mysqli_connect("localhost","root","011792","thoth");
								if (!$con)
								{
									die('Could not connect: ' . mysql_error());
								}

							$id= $_REQUEST['id'];

							if($_SERVER['REQUEST_METHOD'] == "POST") {
								$name = $_REQUEST['name'];
								$title = $_REQUEST['title'];
								$pantheon = $_REQUEST['pantheon'];
								$class = $_REQUEST['class'];
								
								$small = $_REQUEST['smallpic'];
								if (!isset($small)) {
									$smallpic = "../images/default_small.png";
								}
								$large = $_REQUEST['largepic'];
								if (!isset($large)) {
									$largepic = "../images/default.png";
								}
								$description = $_REQUEST['description'];
								if (!isset($description)) {
									$description = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br><br>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";
								}

								mysqli_query($con, "UPDATE gods SET name='".$name."', title='".$title."', pantheon='".$pantheon."', class='".$class."', smallpic='".$small."', largepic='".$large."', description='".$description."' where id='".$id."'");
								
								header('Location: profile.php?id='.$id);
							}
							$result = mysqli_query($con, 'SELECT * FROM gods where id = "'.$id.'"');
							$row = mysqli_fetch_array($result);

						?>
						<div class="gods">
						<form method="post" action="">
							<label>Name: </label><input type="text" name="name" value="<?php echo $row['name']; ?>" required>
							<label>Title: </label><input type="text" name="title" value="<?php echo $row['title']; ?>" required>
							<select name="pantheon" value="<?php echo $row['pantheon']; ?>" required>
								<option disabled>Pantheon</option>
								<option value="hindu"<?php if ($row['pantheon'] == "hindu") echo "selected='selected'";?>>hindu</option>
								<option value="mayan"<?php if ($row['pantheon'] == "mayan") echo "selected='selected'";?>>mayan</option>
								<option value="norse"<?php if ($row['pantheon'] == "norse") echo "selected='selected'";?>>norse</option>
								<option value="greek"<?php if ($row['pantheon'] == "greek") echo "selected='selected'";?>>greek</option>
								<option value="roman"<?php if ($row['pantheon'] == "roman") echo "selected='selected'";?>>roman</option>
								<option value="chinese"<?php if ($row['pantheon'] == "chinese") echo "selected='selected'";?>>chinese</option>
								<option value="egyptian"<?php if ($row['pantheon'] == "egyptian") echo "selected='selected'";?>>egyptian</option>
								

							</select>
							<select name="class" value="<?php echo $row['class']; ?>" required>
								<option disabled>Class</option>
								<option value="hunter"<?php if ($row['class'] == "hunter") echo "selected='selected'";?>>hunter</option>
								<option value="mage"<?php if ($row['class'] == "mage") echo "selected='selected'";?>>mage</option>
								<option value="assassin"<?php if ($row['class'] == "assasin") echo "selected='selected'";?>>assassin</option>
								<option value="warrior"<?php if ($row['class'] == "warrior") echo "selected='selected'";?>>warrior</option>
								<option value="guardian"<?php if ($row['class'] == "guardian") echo "selected='selected'";?>>guardian</option>
							</select>
							<label>Small Picture</label><input type="text" name="smallpic" value="<?php echo $row['smallpic']; ?>">
							<label>Large Picture</label><input type="text" name="largepic" value="<?php echo $row['largepic']; ?>" class="large">
							<textarea name="description" placeholder="description"><?php echo $row['description']; ?></textarea>
							
							<input type="submit" value="Update">
						</form>
						
						
					</div>
					<div class="login-border"></div>
				</div>
			</div>
		</div>

		<?php include "footer.php"; ?>