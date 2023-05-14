<?php 
    include("connect.php");
    
        $RoomID=$_GET['RoomID'];
        $select="SELECT * FROM room_db
            WHERE RoomID='$RoomID'";
    $result=mysqli_query($connection,$select);
    $callvalue=mysqli_fetch_assoc($result);

        if (isset($_POST['sent'])) 
        {
            $userid=$_POST['userid'];
            $roomid=$_POST['roomid'];
            $review=$_POST['review'];
            $anonymous=$_POST['anonymous'];
            if ($anonymous == "1") {
                   $query="INSERT INTO review_db SET Anonymous = '1' ";
               } 
               else 
               {
                    $query="INSERT INTO review_db SET Anonymous = '0' ";
               }
               $sent="INSERT INTO `review_db`(`UserID`, `RoomID`, `Review`, `Anonymous`)
                     VALUES ('$userid', '$roomid', '$review', '$anonymous' )";
                    $result=mysqli_query($connection,$sent);
                    if ($result) 
                    {
                        echo "<script>window.alert('Room Reviewed.')</script>";    
                    }
                    else
                    {
                        echo "<script>window.alert('Fail Review')</script>";
                    }

        }
        $select1="SELECT review_db.Review, review_db.Anonymous, user_db.FullName from review_db
        INNER JOIN user_db ON review_db.UserID=user_db.UserID WHERE ReviewID='$ReviewID'";
        $result1=mysqli_query($connection,$select1);
        
    
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Room Review</title>
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
                        <h2 class="mt-4">Room Review</h2><br>

                        <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="roomid" type="text" placeholder="Enter Room" value="<?= $callvalue['RoomID'] ?>" hidden/>
                                                        <label for="Category"></label><br>
                                                    </div>

                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="userid" type="text" placeholder="Enter User"value="<?php echo $_SESSION["UserID"] ?>"hidden />
                                                        <label for="Category"></label>
                                                    </div>

                                                
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="review" type="text" placeholder="Enter your Review"  />
                                                        <label for="Category">Review</label><br>
                                                        <input name="anonymous" value="1" type="checkbox" />&nbspAnonymous
                                                        
                                                    </div><br>

                                                    
     

                                            

                                                    <div class="mt-4 mb-0">
                                                <div class="d-grid">
<input type="submit" class="btn btn-primary btn-block" name="sent" value="Submit"><br>
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
