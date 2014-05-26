<!DOCTYPE html>
<?php

// Inialize session
session_start();
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
?>
<html>
<head>
	<title>Gods</title>
	<?php include 'header.php'; ?>

		<?php 
			$con = mysqli_connect("localhost","root","011792","thoth");
				if (!$con)
				{
					die('Could not connect: ' . mysql_error());
				}

				$result =mysqli_query($con, "SELECT * FROM gods order by name");
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
						<form action='post' name='filter' class="filter">
							<select>
								<option>No filter</option>
								<optgroup label='pantheon'>
									<option value="hindu">hindu</option>
									<option value="mayan">mayan</option>
									<option value="norse">norse</option>
									<option value="greek">greek</option>
									<option value="roman">roman</option>
									<option value="chinese">chinese</option>
									<option value="egyptian">egyptian</option>
								</optgroup>
								<optgroup label='class'>
									<option value="hunter">hunter</option>
									<option value="mage">mage</option>
									<option value="assassin">assassin</option>
									<option value="warrior">warrior</option>
									<option value="guardian">guardian</option>
								</optgroup>
							</select>
						</form>

						
						<!-- small god pic -->
						<?php
							
						while ($row = mysqli_fetch_array($result)) {
						// echo "<div class='god-container'><img src='".$row["smallpic"]."' alt='".$row["name"]."'><a href='profile.php?id=".$row["id"]."'><div class='god-frame'></div></a>";
						// echo "<a href='profile.php?id=".$row["id"]."'><h3 class='cap'>".$row['name']."</h3></a></div>";
						
						echo "<div class='god-container'><a href='profile.php?id=".$row["id"]."'><img src='".$row["smallpic"]."' alt='".$row["name"]."'></a>";
						echo "<h3 class='cap'><a href='profile.php?id=".$row["id"]."'>".$row['name']."</a></h3></div>";

						}
						?>
					</div>

					

					<div class="login-border"></div>
				</div>
			</div>
				
		</div>


		<?php include "footer.php"; ?>