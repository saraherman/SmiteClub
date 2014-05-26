<!DOCTYPE html>
<?php

// Inialize session
session_start();
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
?>
<html>
<head>
	<title>Search</title>
	<?php include 'header.php'; ?>
	<div class="content">
		<div class="container">
		<?php 
			$con = mysqli_connect("localhost","root","011792","thoth");
				if (!$con)
				{
					die('Could not connect: ' . mysql_error());
				}
				if (isset($_REQUEST['search'])) {
					$search = $_REQUEST['search'];
				}
				else{
					$search="null";
				}
				

				$result = mysqli_query($con, "SELECT * FROM gods WHERE name like '%".$search."%' ORDER BY name");
				
		 		$row_cnt = mysqli_num_rows($result);
		?>
			<div class="profile">
				<form class="search" method="post" action="searchpage.php">
							<input type="text" name="search" placeholder="Search SmiteClub">
							<input type="submit" value="">
						</form>
				<div class="login-border"></div>
				<div class="gods">
				<?php 
					if ($row_cnt>=1) {
					echo "<h3>Search results for gods with '".$search."'.</h3>";
						while ($row = mysqli_fetch_array($result)) {
						echo "<div class='god-container'><img src='".$row["smallpic"]."' alt='".$row["name"]."'><a href='profile.php?id=".$row["id"]."'><div class='god-frame'></div></a>";
						echo "<a href='profile.php?id=".$row["id"]."'><h3 class='cap'>".$row['name']."</h3></a></div></li>";
						}
					} else {
						echo "<h3>No search results found.</h3>";
					}
				?>
			</div>
				<div class="login-border"></div>
			</div>			

			</div>
				
		</div>


		<?php include "footer.php"; ?>