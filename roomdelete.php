<?php 
	include("connect.php");

	$RoomID=$_GET['RoomID'];
	$delete="DELETE FROM room_db
			WHERE RoomID='$RoomID'";
	$result=mysqli_query($connection,$delete);
	if ($result) 
	{
		echo "<script>window.location='adminhome.php'</script>";
	}




 ?>