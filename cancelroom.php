<?php 
	include("connect.php");
	
	$BookingID=$_GET['BookingID'];
	$delete="DELETE FROM booking_db
			WHERE BookingID='$BookingID'";
	$result=mysqli_query($connection,$delete);
	if ($result) {
		echo "<script>window.location='bookedroomlist.php'</script>";
	}




 ?>