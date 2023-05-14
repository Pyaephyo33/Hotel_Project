<?php 
	include("connect.php");

	$ReviewID=$_GET['ReviewID'];
	$delete="DELETE FROM review_db
			WHERE ReviewID='$ReviewID'";
	$result=mysqli_query($connection,$delete);
	if ($result) 
	{
		echo "<script>window.location='reviewedroom.php'</script>";
	}




 ?>