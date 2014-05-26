<?php
	$string = '011792';
	echo password_hash($string, "mypass");
	password_verify ( $string , "mypass");
?>
	<?php
// See the password_hash() example to see where this came from.
$hash = '$2y$07$BCryptRequires22Chrcte/VlQH0piJtjXl.0t1XkA8pw9dMXTpOq';

if (password_verify('rasmuslerdorf', $hash)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}

$con = mysqli_connect("localhost","root","011792","thoth");
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	echo "Connected...!";

mysqli_query($con, "INSERT into gods (name, title, class, pantheon, smallpic, largepic) VALUES ('thanatos', 'hand of death', 'assassin', 'greek', 'images/thanatos_icon.png', 'images/thanatos.png')");

$result = mysqli_query($con,"SELECT * FROM contactinfo ORDER BY lastname");
		$row_cnt = mysqli_num_rows($result);

?>

<!-- large picture -->
						<?php echo '<img src="'.$row['largepic'].'" class="largepic" alt="'.$row['name'].'">'; ?>

						<!-- name -->
						<?php echo '<h1 class="cap">'.$row['name'].'</h1>';?>

						<!-- title -->
						<?php echo '<h2 class="cap">'.$row['title'].'</h2>';?>

						<!-- pantheon -->
						<?php echo'<h3 class="allcap">'.$row['pantheon'].'</h3>';?>

						<!-- description -->
					<?php echo '<p class="description">'.$row['description'].'</p>';?>

					<?php 
						if (isset($_SESSION['uName'])) {
							echo "<h1>".$_SESSION['uName']."&nbsp;|&nbsp;<a href='logout.php'>logout</a></h1>";
						} else {
							echo "<h1><a href='login.php'>Login</a>&nbsp;|&nbsp;<a href='register.php'>Register</a></h1>";
						}
					?>

					<!-- small god pic -->
						<?php
							echo "<div class='god-container'><img src='".$row["smallpic"]."' alt='".$row["name"]."'><a href='profile.php?id=".$row["id"]."'><div class='god-frame'></div></a>
						</div>";
						?>