<?php
    include("connect.php");
    
    $date = date('Y-m-d H:i:s');
    $UserID=$_SESSION["UserID"];

    $select="SELECT approve_db.ApproveID, user_db.UserID, booking_db.status, approve_db.LeaveDate, booking_db.BookingID, room_db.RoomNo, room_db.RoomType, room_db.RoomImage FROM approve_db
    LEFT JOIN booking_db On booking_db.BookingID=approve_db.BookingID
    INNER JOIN room_db ON room_db.RoomID=booking_db.RoomID
    INNER JOIN user_db ON booking_db.UserID=user_db.UserID
    WHERE user_db.UserID='$UserID' AND (booking_db.status=1 OR booking_db.status=2) ORDER BY booking_db.BookingID;";
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
        <title>My Room</title>
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
                        <h2 class="mt-4">HotelRoom</h2>
                        
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <form action="" method="POST">
        <table>
            <tr>
                <td class="float-left"><h4>My Room</h4></td>
                    
            </tr>
        </table>
        </form>
                            </div>

                            <div class="card-body">
                                <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th scope="col" class="text-center">RoomNo</th>
                <th scope="col" class="text-center">Room</th>
                <th scope="col" class="text-center">RoomType</th>
                <th scope="col" class="text-center">Check-Out Date</th>
                <th scope="col" class="text-center">Status</th>
                <th scope="col" class="text-center">Action</th>    
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_object($result)) {  ?>
            <tr>
                    <td class="text-center"><?php echo $row->RoomNo;?></td>
                    <td class="text-center"><?php echo "<img src='uploads/".$row->RoomImage."' width='140' height='150'>";?></td>
                    <td class="text-center"><?php echo $row->RoomType;?></td>
                    <td class="text-center"><?php echo $row->LeaveDate;?></td>
                    <td class="text-center"><?php if ($date>$row->LeaveDate) {
                        echo "<label class='text-danger'>Check-Out</label>";
                    } else{
                        echo "<label class='text-success'>Check-In</label>";
                    } ?></td>
                    <td width="15%" class="text-center">
                        <?php if ($row->status==2) 
                        {
                            echo '<a class="btn btn-secondary" href="#">Check-Out</a>';
                        }
                        else{
                            echo '<a class="btn btn-primary" href="checkout.php?BookingID='. $row->BookingID.'">Check-Out</a>';
                        } ?>
                        
                    </tr>
            <?php } ?>
                            
        </tbody>
        </table>
                            </div>
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
