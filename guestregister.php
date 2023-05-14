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
            echo "<script>window.location='guesthome.php'</script>";
        }
        else
        {
            echo "<p>Something went wrong in Registration : " . mysqli_error($connection) . "</p>";
        }
    }
    $select="SELECT * FROM roles_db WHERE RoleID=2";
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
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
    
        <title>Registration</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="css/all.min.css">
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

</head>
<body class="sb-nav-fixed">
       
            <div id="layoutSidenav_content">
                
                <main>
                    <div class="container-fluid px-4">

                        <div class="container">
                        <form action="" method="POST">
                            <br>
                        <div class="login100-form-title" style="background-image: url(images/hotel.jpg);">
                    <span class="login100-form-title-1">
                        Register 
                    </span>
                </div><br>

                        <div class="form-floating mb-3 mb-md-0">
                            <input type="text" class="form-control" name="userfullname" placeholder="userfullname" required>
                                                        <label for="Category">Full Name</label>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
<!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
    <script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
    <script src="js/main.js"></script>
    </body>
</html>