<?php 
	include ("connect.php");
	
	
	$Today=date('y:m:d');
	
	$RoomID=$_GET['RoomID'];
    $select="SELECT * FROM room_db
            WHERE RoomID='$RoomID'";
    $result=mysqli_query($connection,$select);
    $callvalue=mysqli_fetch_assoc($result);

    if (isset($_POST['book'])) 
    {
        $roomid=$_POST['roomid'];
        $userid=$_POST['userid'];
        $payment=$_POST['payment'];
        $checkin=$_POST['checkin'];
        $checkout=$_POST['checkout'];
        $adult=$_POST['adult'];
        $child=$_POST['child'];


        $book="INSERT INTO `booking_db`(`RoomID`, `UserID`, `PaymentID`, `Checkin`, `Checkout`,`Adult`,`Child`) 
        		VALUES  
        		('$roomid','$userid','$payment','$checkin','$checkout', '$adult', '$child')";
        $recordbook=mysqli_query($connection,$book);
        if ($recordbook) 
        {

            echo "<script>window.alert('Room Booked.')</script>";
            echo "<script>window.location='guesthome.php'</script>";
        }
        else
        {
            echo (mysqli_error($connection));
        }
    }
    $selectpayment="SELECT * FROM `payment_db`";
    $resultpayment=mysqli_query($connection,$selectpayment);
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Room Book</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="css/all.min.css">
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

    </head>
    <body class="sb-nav-fixed">
        
    	<?php include("guestheader.php");?>
        <?php include("guestsidebar.php") ?>
    	
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">

                        <div class="container">
                        <form action="" method="POST">
                        <h2 class="mt-4">Room Book</h2><br>

                        <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="roomid" type="text" placeholder="Enter Room" value="<?= $callvalue['RoomID'] ?>" hidden/>
                                                        <label for="Category"></label><br>
                                                    </div>

                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="userid" type="text" placeholder="Enter User"value="<?php echo $_SESSION["UserID"] ?>" hidden/>
                                                        <label for="Category"></label>
                                                    </div>

                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="bookid" type="text" placeholder="Enter your Category" value="<?= $callvalue['RoomNo'] ?>" disabled/>
                                                        <label for="Category">Room No</label><br>
                                                    </div>

                                                    <div>
<br><img src="uploads/<?php echo $callvalue['RoomImage']; ?>" id="output" width="250" height="300">
                                                        
                                                    </div><br>

                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <select class="form-control" name="payment" required>
                                                            <?php while ($row = mysqli_fetch_array($resultpayment)):;?>
                <option value="<?php echo $row[0];?>"><?php echo $row[1];?></option>
                <?php endwhile; ?>
                                                        </select>
                                                        <label for="Category">Choose PaymentMethod</label><br>
                                                    </div>


                                                      <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="checkin" type="date" placeholder="Enter Checkin" value="<?php echo strftime('%Y-%m-%d',
  strtotime("now")); ?>" required/>
                                                        <label for="Category">Checkin Date</label><br>
                                                    </div>
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="checkout" type="date" value="<?php echo strftime('%Y-%m-%d',
  strtotime('+7 days')); ?>" placeholder="Enter Checkout" required/>
                                                        <label for="Category">Checkout Date</label><br>
                                                    </div>
                                                    

                                                    

                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="adult" type="number" placeholder="Number of Adult" />
                                                        <label for="Category">Adult</label>
                                                    </div><br>

                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="child" type="number" placeholder="Number of Child" />
                                                        <label for="Category">Child</label>
                                                    </div><br>

                                                    <div class="mt-4 mb-0">
                                                <div class="d-grid">
<input type="submit" class="btn btn-primary btn-block" name="book" value="Room Book"><br>
<input type="button" class="btn btn-secondary btn-block" onclick="history.back();" value="Back">
                                            </div>
                                            </div></form>
                        
                        </div>
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
        <script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>

    </body>
</html>
