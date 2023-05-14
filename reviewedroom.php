<?php
    include("connect.php");
    

     $UserID=$_SESSION["UserID"];

    $select="SELECT review_db.ReviewID, user_db.UserID,review_db.Review, review_db.Anonymous, user_db.FullName, room_db.RoomNo, room_db.RoomImage  FROM review_db
    INNER JOIN room_db ON room_db.RoomID=review_db.RoomID
    INNER JOIN user_db ON review_db.UserID=user_db.UserID ORDER BY ReviewID;";
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
        <title>Reviewed Room</title>
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
                        <h2 class="mt-4">Room</h2>
                        
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <form action="" method="POST">
        <table>
            <tr>
                <td class="float-left"><h4>Reviewed Room List</h4></td>
                    
            </tr>
        </table>
        </form>
                            </div>

                            <div class="card-body">
                                <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th scope="col" class="text-center">ID</th>
                <th scope="col" class="text-center">RoomNo</th>
                <th scope="col" class="text-center">Room</th>
                <th scope="col" class="text-center">Guests</th>
                <th scope="col" class="text-center">Review</th>
                <th scope="col" class="text-center">Action</th>  
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_object($result)) {  ?>
            <tr>
                    <td class="text-center"><?php echo $row->ReviewID;?></td>
                    <td class="text-center"><?php echo $row->RoomNo;?></td>
                    <td class="text-center"><?php echo "<img src='uploads/".$row->RoomImage."' width='140' height='150'>";?></td>
                    <td class="text-center">
                        <?php if ($row->Anonymous == '0') 
                                            {
                                                echo $row->FullName;

                                            }
                                            else
                                            {
                                                echo "Anonymous";
                                            }?></td>
                    <td class="text-center"><?php echo $row->Review;?></td>
                    <td width="25%" class="text-center">
                        <?php echo '<a class="btn btn-danger" onclick="return confirm(\'Review Delete Confirm?\')" href="reviewdelete.php?ReviewID='. $row->ReviewID.'">Delete</a>';?>
                        </td>
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
