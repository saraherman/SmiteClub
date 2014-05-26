	<link rel="stylesheet" type="text/css" href="styles/normalize.css">
	<link rel="stylesheet" type="text/css" href="styles/thoth.css">
	<link rel="icon" type="image/png" href="images/book.png">
</head>
<body>

	<div class="background">
		<div class="header">
			<div class="container">
				
				
				<?php
					if (isset($_SESSION['user'])) {
							echo "<p>".$_SESSION['user']."&nbsp; || &nbsp;<a href='logout.php'>logout</a></p>";
						} else {
							echo "<p><a href='login.php'>Log in</a> || <a href='register.php'>Become a God</a></p>";
						}

				?>
				<h1 class="title">Smite Club</h1>
			</div>
		</div>
		<!-- <div class='border'></div> -->