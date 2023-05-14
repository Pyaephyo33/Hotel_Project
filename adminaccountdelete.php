<?php 
	include("connect.php");
	
	$UserID=$_GET['UserID'];
	$delete="DELETE FROM user_db
			WHERE UserID='$UserID'";
	$result=mysqli_query($connection,$delete);
	if ($result) {
		echo "<script>window.location='adminlist.php'</script>";
	}




 ?>