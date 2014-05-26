<?php 
	 if(isset($_POST['search']))
   {
   	$search = $_REQUEST['search'];
    //Do all the submission part or storing in DB work and all here
    header('Location: http://localhost/finalproject/search.php?search='.$search);
   }
?>