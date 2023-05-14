<?php 
	include("connect.php");

	$CategoryID=$_GET['CategoryID'];
	$deletecategory="DELETE FROM category_db
			WHERE CategoryID='$CategoryID'";

	$result=mysqli_query($connection,$deletecategory);
	if ($result) {
		echo "<script>window.location='categorylist.php'</script>";
	}




 ?>