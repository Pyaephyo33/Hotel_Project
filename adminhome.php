<?php

    include("connect.php");
    
    if (isset($_POST['roomsearch'])) 
            {
                $searchbtn = $_POST['roomsearch'];
                $select="SELECT room_db.RoomID, room_db.RoomNo, room_db.RoomImage, room_db.RoomType, category_db.CategoryName, room_db.Prices FROM room_db 
                        INNER JOIN category_db ON room_db.CategoryID=category_db.CategoryID WHERE RoomNo LIKE '%$searchbtn%' OR CategoryName LIKE '%$searchbtn%' OR RoomType LIKE '%$searchbtn%'
                            ORDER BY RoomID";

            }
            else
            {
                $select="SELECT room_db.RoomID, room_db.RoomNo, room_db.RoomImage, room_db.RoomType, category_db.CategoryName, room_db.Prices FROM room_db 
                INNER JOIN category_db ON room_db.CategoryID=category_db.CategoryID
                ORDER BY RoomID";
                $searchbtn="";
            }
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
        <title>Admin Home</title>
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
                        <h2 class="mt-4">Rooms</h2>
                        
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <form action="" method="POST">
        <table>
            <tr>
                <td class="float-left"><h4>Rooms List</h4></td>
                <td width="21.2%"><input class="form-control" type="text" name="roomsearch" placeholder="Search by Rooms/Type" value="<?php echo $searchbtn?>"></td>
                <td width="10%"><input type="submit"  class="btn btn-primary" name="" value="Search"></td>

                    
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
                <th scope="col" class="text-center">Type</th>
                <th scope="col" class="text-center">Category</th>
                <th scope="col" class="text-center">Prices</th>
                <th scope="col" class="text-center">Action</th>    
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_object($result)) {  ?>
            <tr>
                    
                    <td class="text-center"><?php echo $row->RoomNo;?></td>
                    <td class="text-center"><?php echo "<img src='uploads/".$row->RoomImage."' width='150' height='100'>";?></td>
                    <td class="text-center"><?php echo $row->RoomType;?></td>

                    <td class="text-center"><?php echo $row->CategoryName;?></td>
                    <td class="text-center"><?php echo $row->Prices;?> USD</td>
                    <td width="25%" class="text-center">
                        <?php echo '<a class="btn btn-primary" href="roomdetail.php?RoomID='. $row->RoomID.'">View</a>';?> &nbsp
                        <?php echo '<a class="btn btn-primary" href="roomedit.php?RoomID='. $row->RoomID.'">Edit</a>';?>&nbsp
                        <?php echo '<a class="btn btn-danger" onclick="return confirm(\'Room Delete Confirm?\')" href="roomdelete.php?RoomID='. $row->RoomID.'">Delete</a>';?>
                        
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
if ( window.history.repla0ceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>

    </body>
</html>
