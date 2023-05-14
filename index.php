<?php
    include("connect.php");
    if ($_SERVER["REQUEST_METHOD"]=="POST") {
        $username=$_POST["username"];
        $password=$_POST["password"];

        $select="SELECT * FROM user_db
                WHERE User_name='$username' 
                AND Password='$password'";
        $result=mysqli_query($connection,$select);
        $record=mysqli_num_rows($result);
        $row=mysqli_fetch_array($result);
        

        if($record > 0)
        {
        if($row["RoleID"]=="1")
            {   
                $_SESSION["UserID"]=$row['UserID'];
                $_SESSION["User_name"]=$username;
                header("location:adminhome.php");
            }
            elseif($row["RoleID"]=="2")
            {
                $_SESSION["UserID"]=$row['UserID'];
                $_SESSION["User_name"]=$username;
                header("location:guesthome.php");
            }
        }
        else
        {
            $error="Username or password <br>is incorrect!";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
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
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Login 
					</span>
				</div>

				<form class="login100-form validate-form" action="" method="post">

					<div class="wrap-input100 validate-input m-b-26" data-validate="User Name is required">
						<span class="label-input100">UserName</span>
						<input class="input100" type="text" name="username" placeholder="Enter UserName" required />
						<span class="focus-input100"></span>
					</div>	

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" placeholder="Enter password" required />
						<span class="focus-input100"></span>
					</div>

					<div class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>
					</div>
						
                    <div>
                    	<input type="submit" class="btn btn-primary" name="login" value="Login">
                    	<br>
                    	<a href="guestregister.php">Register Account</a>
                    </div>
                    <?php 
                        if (isset($_POST['login'])) {
                     ?>
                    <h3 class="text-danger"><?= $error; ?></h3>
                    <?php } ?>


                    <div>
				

				
			</div>
				</form>
			</div>
			
		</div>
	</div>


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