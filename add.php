<?php

// Inialize session
session_start();

// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['user'])) {
	header('Location: login.php');
}
	$_SESSION['url'] = $_SERVER['REQUEST_URI'];
?>
<html>
<head>
	<title>Add a God</title>
	<?php include 'header.php'; ?>

		

		<div class="content">
			<div class="container">
				<div class="profile">
					<form class="search" method="post" action="searchpage.php">
							<input type="text" name="search" placeholder="Search SmiteClub">
							<input type="submit" value="">
						</form>
					<div class="login-border"></div>
					<div class="gods">
						<form method="post" action="">
							<label>Name: </label><input type="text" name="name" required>
							<label>Title: </label><input type="text" name="title" required>
							<select name="pantheon" required>
								<option disabled selected>Pantheon</option>
								<option value="hindu">hindu</option>
								<option value="mayan">mayan</option>
								<option value="norse">norse</option>
								<option value="greek">greek</option>
								<option value="roman">roman</option>
								<option value="chinese">chinese</option>
								<option value="egyptian">egyptian</option>
								

							</select>
							<select name="class" required>
								<option disabled selected>Class</option>
								<option value="hunter">hunter</option>
								<option value="mage">mage</option>
								<option value="assassin">assassin</option>
								<option value="warrior">warrior</option>
								<option value="guardian">guardian</option>
							</select>
							<label>Small Picture</label><input type="text" name="smallpic" placeholder="images/GODNAME.png" value="images/GODNAME.png">
							<label>Large Picture</label><input type="text" name="largepic" placeholder="images/default.png" value="http://www.smitefire.com/images/god/card/GODNAME.png" class='large'>
							<textarea name="description" placeholder="description"></textarea>
							
							<input type="submit" value="Create">
						</form>
						
						<?php 
							$con = mysqli_connect("localhost","root","011792","thoth");
								if (!$con)
								{
									die('Could not connect: ' . mysql_error());
								}

							if($_SERVER['REQUEST_METHOD'] == "POST") {
								$name = $_REQUEST['name'];
								$title = $_REQUEST['title'];
								$pantheon = $_REQUEST['pantheon'];
								$class = $_REQUEST['class'];
							
								
								if (isset($_REQUEST['smallpic'])) {
									$small = $_REQUEST['smallpic'];
								}
								if (!isset($_REQUEST['smallpic'])) {
									$small = "images/".$name.".png";
									
								}
								
								if (isset($_REQUEST['largepic'])) {
									$large = $_REQUEST['largepic'];
								}
								if (!isset($_REQUEST['largepic'])) {
									$large = "http://www.smitefire.com/images/god/card/".$name.".png";
									
								}

								if (isset($_REQUEST['description'])) {
									$description = $_REQUEST['description'];
								}
								if (!isset($_REQUEST['description'])) {
									$description = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br><br>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";
								}

								$found = false;


							$result = mysqli_query($con, 'SELECT * FROM gods where name = "'.$name.'"');
							

							while($row = mysqli_fetch_array($result)) {
										$found = true;
									}
								if($found == true){
									echo "<p style='display:inline-block;'>This god already exists.</p>";
								}
								else{
									$name= ucfirst($name);
									$title= ucfirst($title);
									$pantheon= ucfirst($pantheon);
									mysqli_query($con, "INSERT into gods (name, title, pantheon, class, smallpic, largepic, description) VALUES ('".$name."', '".$title."','".$pantheon."','".$class."','".$small."', '".$large."','".$description."')");
									echo "<p style='display:inline-block;'><span class='cap'>".$name."</span>: <span class='cap'>".$title."</span> has been added to the <span class='cap'>".$pantheon."</span> pantheon.</p>";
									
								}
							}
						?>
					</div>
					<div class="login-border"></div>
				</div>
			</div>
		</div>

		<?php include "footer.php"; ?>