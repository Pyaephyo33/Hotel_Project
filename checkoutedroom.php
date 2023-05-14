<?php
    include("connect.php");
    
    $Today=date('y:m:d');
    $BookingID=$_GET['BookingID'];
    $select="SELECT booking_db.BookingID, room_db.RoomID, room_db.RoomNo, room_db.RoomImage FROM booking_db
    INNER JOIN room_db ON room_db.RoomID=booking_db.RoomID
            WHERE BookingID='$BookingID'";

    $result=mysqli_query($connection,$select);
    $callvalue=mysqli_fetch_assoc($result);
    if (isset($_POST['update'])) 
    {
        $update="UPDATE booking_db SET status=3 WHERE BookingID='$BookingID'";
        $recordupdate=mysqli_query($connection,$update);
        if ($recordupdate) 
        {
            echo "<script>window.alert('Checkouted Room.')</script>";
            echo "<script>window.location='checkoutroom.php'</script>";
            $bookid=$_POST['bookid'];
            $update1=mysqli_query($connection,"UPDATE approve_db
SET status =1
WHERE BookingID='$BookingID'");
            
        }
        else
        {
            echo (mysqli_error($connection));
        }
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
        <title>Return Book</title>
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
                        <h2 class="mt-4">Checkout Room</h2><br>

                            <div>
<br><img src="uploads/<?php echo $callvalue['RoomImage']; ?>" id="output" width="250" height="300">
                                                        
                                                    </div><br>
                        <div class="form-floating mb-3 mb-md-0">

                                                        <input class="form-control" name="bookingid" type="text" placeholder="Enter your booking" value="<?= $callvalue['BookingID'] ?>" required hidden/>
                                                        <label for="Category"></label><br>

                                                        <input type="number" name="roomid" value="<?= $callvalue['RoomID']?>" hidden>
                                                    <div class="form-floating mb-3 mb-md-0">

                                                        <input class="form-control" name="roomno" type="text" placeholder="Enter your Room" value="<?= $callvalue['RoomNo'] ?>" disabled/>
                                                        <label for="Category">Room No</label><br>
                                                    </div>
                                                    
                                                    
                                                    

                                                    <div class="mt-4 mb-0">
                                                <div class="d-grid">
<input type="submit" class="btn btn-primary btn-block" name="update" value="Accept"><br>
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
        <script>
var loadFile = function(event) {
        var image = document.getElementById('output');
        image.src = URL.createObjectURL(event.target.files[0]);
};
</script>
    </body>
</html>
