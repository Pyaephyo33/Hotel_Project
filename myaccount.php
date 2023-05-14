<?php
    include("connect.php");
    
    $UserLoginID=$_SESSION['UserID'];
    $selectUser="SELECT * FROM user_db WHERE UserID='$UserLoginID'";
    $recordUser=mysqli_query($connection,$selectUser);
    $resultUser=mysqli_fetch_assoc($recordUser);
    if (!isset($_SESSION["User_name"])) {
        header("location:../index.php");
    }

    if (isset($_POST['update'])) {
        $fullname=$_POST['fullname'];
        $password=$_POST['password'];
        $email=$_POST['email'];
        $address=$_POST['address'];
        $phone=$_POST['phone'];
        
        $update="UPDATE user_db
                SET FullName='$fullname',
                Password='$password',
                User_email='$email',
                Address='$address',
                Contact_No='$phone'
                WHERE UserID='$UserLoginID'";
        $recordupdate=mysqli_query($connection,$update);
        if ($recordupdate) {
            echo "<script>window.alert('User Account updated.')</script>";
            echo "<script>window.location.assign('logout.php')</script>";
        }
        else
        {
            echo "<script>window.alert('Failed to update user information!')</script>";
        }
    }
    
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>My Info</title>
    <meta charset="UTF-8">
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
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="login100-form-title" style="background-image: url(images/hotel.jpg);">
                    <span class="login100-form-title-1">
                        My Info 
                    </span><br>
                </div>
                                    <div class="card-body">

                                        <form method="POST" action="">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="fullname" value="<?= $resultUser['FullName'] ?>" placeholder="fullname" required>
                                                <label for="inputEmail">Full Name</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="Email" class="form-control" name="email" value="<?= $resultUser['User_email'] ?>" placeholder="name@example.com"required>
                                                <label for="inputEmail">Email</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" name="phone" value="<?= $resultUser['Contact_No'] ?>"placeholder="xxxxxxx"required>
                                                <label for="inputEmail">Phone</label>
                                            </div>

                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="address" value="<?= $resultUser['Address'] ?>"placeholder="Ygn"required>
                                                <label for="inputEmail">Address</label>
                                            </div>

                                            <div class="form-floating mb-3">
                                                <input type="password" class="form-control" name="password" placeholder="password" required>
                                                <label for="inputEmail">Password</label>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid">
<input type="submit" class="btn btn-primary btn-block" name="update" value="Update MyInfo"><br>
<input type="button" class="btn btn-secondary btn-block" onclick="history.back();" value="Back">
                                                </div>

                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
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

