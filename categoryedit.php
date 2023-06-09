<?php
	include("connect.php");
   

	$CategoryID=$_GET['CategoryID'];

	$select="SELECT * FROM category_db
			WHERE CategoryID='$CategoryID'";
	$result=mysqli_query($connection,$select);
	$callvalue=mysqli_fetch_assoc($result);


	if (isset($_POST['edit'])) {
		$categoryname=$_POST['categoryname'];
		
		$update="UPDATE category_db
				SET CategoryName='$categoryname'
				WHERE CategoryID='$CategoryID'";
		$recordupdate=mysqli_query($connection,$update);

		if ($recordupdate) {
			echo "<script>window.alert('Category edited.')</script>";
			echo "<script>window.location.assign('categorylist.php')</script>";
		}
		else
		{
			echo "<script>window.alert('Unsuccess to edit Category!')</script>";
		}
	}
	if (isset($_POST['back'])) {
		header("location:categorylist.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Category Edit</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="css/all.min.css">
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

    </head>
    <body class="sb-nav-fixed">
    <?php include("adminheader.php");?>
    <?php include("adminsidebar.php") ?>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">

                    	<div class="container">
                    	<form action="" method="POST">
                        <h2 class="mt-4">Category</h2><br>

                        <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="categoryname" type="text" placeholder="Enter Category" value="<?= $callvalue['CategoryName'] ?>" required/>
                                                        <label for="Category">Category</label>
                                                    </div>

                                                    <div class="mt-4 mb-0">
                                                <div class="d-grid">
<input type="submit" class="btn btn-primary btn-block" name="edit" value="Edit Category"><br>
<input type="button" class="btn btn-secondary btn-block" onclick="history.back();" value="Back">
                                            </div>
                                            </div></form>
                        </div>
                        <div class="container">
                        
                        <br>
                        
                    </div>
                </main>
                <?php include("footer.php"); ?>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
