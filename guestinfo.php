<?php
    include("connect.php");
    

    $UserID=$_GET['UserID'];
    $select="SELECT * FROM user_db
            WHERE UserID='$UserID'";
    $result=mysqli_query($connection,$select);
    $callvalue=mysqli_fetch_assoc($result);

    if (isset($_POST['update'])) 
    {
		$userfullname=$_POST['userfullname'];
		$username=$_POST['username'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$nrc=$_POST['nrc'];
		$address=$_POST['address'];
		$contactno=$_POST['contactno'];
		
		
		$update="UPDATE `user_db` 
                SET 
                `FullName`='$userfullname',
                `User_name`='$username',
                `User_email`='$email',
                `Password`='$password',
                `NRC`='$nrc',
                `Address`='$address',
                `Contact_No`='$contactno'
                WHERE UserID='$UserID'";
		$recordupdate=mysqli_query($connection,$update);

		if ($recordupdate) 
		{
			echo "<script>window.alert('User information updated.')</script>";
			echo "<script>window.location.assign('adminlist.php')</script>";
		}
		else
		{
			echo "<p>Something went wrong in product entry : " . mysqli_error($connection) . "</p>";
		}
	}
    $select="SELECT * FROM roles_db";
    $result=mysqli_query($connection,$select);
        	


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Guest Info</title>
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

                        	<form action="" method="POST" enctype="multipart/form-data">
                            <h2 class="mt-4">Guest Info</h2><br>

                            							<div class="form-floating mb-3 mb-md-0">
                            							<input type="text" class="form-control" name="userfullname" placeholder="userfullname" value="<?= $callvalue['FullName'] ?>" required/>
                                                            <label for="Category">FullName</label>
                                                        </div><br>

                                                        <div class="form-floating mb-3 mb-md-0">
                                                        	<input type="text" class="form-control" name="username" placeholder="username" value="<?= $callvalue['User_name'] ?>" required/>
                                                            
                                                            <label for="Category">Username</label>
                                                        </div><br>

                                                        <div class="form-floating mb-3 mb-md-0">
                                                            <input type="Email" class="form-control" name="email" placeholder="useremail" value="<?= $callvalue['User_email'] ?>" required/>
                                                            <label for="Category">UserEmail</label>
                                                        </div><br>

                                                        <div class="form-floating mb-3 mb-md-0">
                                                        	<input type="text" class="form-control" name="password" placeholder="password" value="<?= $callvalue['Password'] ?>" required/>
                                                            <label for="Category">Password</label>
                                                        </div><br>

                                                        <div class="form-floating mb-3 mb-md-0">
                                                            <input type="text" class="form-control" name="nrc" placeholder="nrc" value="<?= $callvalue['NRC'] ?>" required/>
                                                            <label for="Category">NRC</label>
                                                        </div><br>

                                                         <div class="form-floating mb-3 mb-md-0">
                                                            <input type="text" class="form-control" name="address" placeholder="address" value="<?= $callvalue['Address'] ?>" required/>
                                                            <label for="Category">Address</label>
                                                        </div><br>

                                                        
                                                        <div class="form-floating mb-3 mb-md-0">
                                                        	<input type="number" class="form-control" name="contactno" placeholder="contactno" value="<?= $callvalue['Contact_No'] ?>" required/>
                                                            <label for="Category">Contact Number</label>
                                                        </div><br>
                                                    
                                                       <div class="mt-4 mb-0">
                                                <div class="d-grid">
<input type="submit" class="btn btn-primary btn-block" name="update" value="Update Info"><br>
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