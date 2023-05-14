<?php 
    include("connect.php");


    if (isset($_POST['register'])) 
    {
        $userfullname=$_POST['userfullname'];
        $username=$_POST['username'];
        $rolename=$_POST['rolename'];
        $useremail=$_POST['useremail'];
        $password=$_POST['password'];
        $nrc=$_POST['nrc'];
        $address=$_POST['address'];
        $contactno=$_POST['contactno'];
        

        $add="INSERT INTO `user_db`(`FullName`, `User_name`, `RoleID`, `User_email`, `Password`, `NRC`, `Address`, `Contact_No`) 
                VALUES 
                    ('$userfullname', '$username','$rolename', '$useremail', '$password', '$nrc', '$address', '$contactno') ";
        $recordadd=mysqli_query($connection,$add);
        if ($recordadd) {

            echo "<script>window.alert('Successfully Register.')</script>";
            echo "<script>window.location='Register.php'</script>";
        }
        else
        {
            echo "<p>Something went wrong in Registration : " . mysqli_error($connection) . "</p>";
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
        <title>Registration</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="css/all.min.css">
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

    <title>Registration</title>
</head>
<body class="sb-nav-fixed">
<?php include('adminheader.php') ?>
<?php include('adminsidebar.php') ?>
    
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">

                        <div class="container">
                        <form action="" method="POST">
                        <h2 class="mt-4">Registration</h2><br>

                        <div class="form-floating mb-3 mb-md-0">
                            <input type="text" class="form-control" name="userfullname" placeholder="userfullname" required>
                                                        <label for="Category">UserFull Name</label>
                                                    </div><br>

                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input type="text" class="form-control" name="username" placeholder="username" required>
                                                        <label for="Category">Username</label>
                                                    </div><br>


                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <div><select name="rolename" class="form-control" required>
                <?php while ($row = mysqli_fetch_array($result)):;?>
                <option value="<?php echo $row[0];?>"><?php echo $row[1];?></option>
                <?php endwhile; ?>
            </select></div>
                                                    </div><br>

                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input type="Email" class="form-control" name="useremail" placeholder="useremail" required>
                                                        <label for="Category">UserEmail</label>
                                                    </div><br>

                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input type="password" class="form-control" name="password" placeholder="password" required>
                                                        <label for="Category">Password</label>
                                                    </div><br>

                                                    
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input type="number" class="form-control" name="nrc" placeholder="nrc" required>
                                                        <label for="Category">NRC</label>
                                                    </div><br>

                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input type="textarea" class="form-control" name="address" placeholder="address" required>
                                                        <label for="Category">Address</label>
                                                    </div><br>
                                                    
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input type="number" class="form-control" name="contactno" placeholder="contactno" required>
                                                        <label for="Category">Contact Number</label>
                                                    </div><br>

                                                    <div class="mt-4 mb-0">
                                                <div class="d-grid">
                                                    <input type="submit" class="btn btn-primary btn-block" name="register" value="Register">
                                                    <br>
                                                    <input type="reset" class="btn btn-primary btn-block" name="cancel" value="Cancel" />
                                            </div>
                                            </div></form>
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