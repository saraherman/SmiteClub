<!DOCTYPE html>
<?php

	// Destroy session
	session_start();
	$_SESSION["user"] = false;
	$url = $_SESSION['url'];
	session_destroy();
	header('Location: index.php');

// Check, if username session is NOT set then this page will jump to login page

?>
<html>
<head>
	<title>Logout</title>
	
</head>
<body>
</body>
</html>