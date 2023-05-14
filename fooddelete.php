<?php 
	include("connect.php");

	$FoodID=$_GET['FoodID'];
	$delete="DELETE FROM food_db
			WHERE FoodID='$FoodID'";

	$result=mysqli_query($connection,$delete);
	if ($result) {
		echo "<script>window.location='addfood.php'</script>";
	}
 ?>