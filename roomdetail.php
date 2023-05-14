<?php
    include("connect.php");

    $RoomID=$_GET['RoomID'];
    $select="SELECT room_db.RoomNo, room_db.RoomImage, room_db.RoomType, category_db.CategoryName, room_db.Prices FROM room_db
    INNER JOIN category_db ON room_db.CategoryID=category_db.CategoryID
            WHERE RoomID='$RoomID'";
    $result=mysqli_query($connection,$select);
    $callvalue=mysqli_fetch_assoc($result);

    $selectcategory="SELECT * FROM category_db";
    $resultcategory=mysqli_query($connection,$selectcategory);


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>HotelRoom Details</title>
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
                        <h2 class="mt-4">Room Details</h2><br>

                        <div class="form-floating mb-3 mb-md-0">
                            <input type="text" class="form-control" name="roomno" placeholder="roomno"  
                            value="<?= $callvalue['RoomNo'] ?>" disabled>
                                                        <label for="Category">RoomNo</label>
                                                    </div>

                                                    <div>
<br><img src="uploads/<?php echo $callvalue['RoomImage']; ?>" id="output" width="250" height="300">
                                                        
                                                    </div><br>

                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input type="text" class="form-control" name="roomtype" placeholder="roomtype"  value="<?= $callvalue['RoomType'] ?>" disabled> 
                                                        <label for="Category">RoomType</label>
                                                    </div><br>

                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <div>
                                                            <select name="category" class="form-control" disabled>
                <?php while ($row = mysqli_fetch_array($resultcategory)):;?>
                <option value="<?php echo $row[0];?>"><?= $callvalue['CategoryName'] ?></option>
                <?php endwhile; ?>
            </select></div><br>
                                                    
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <textarea class="form-control" name="price" placeholder="price" disabled><?= $callvalue['Prices'] ?> USD</textarea>
                                                        <label for="Category">Price</label>
                                                    </div><br>

                                                    <div class="mt-4 mb-0">
                                                <div class="d-grid">
                                                    <input type="button" class="btn btn-secondary btn-block" onclick="history.back();" value="Back">
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

        <script>
var loadFile = function(event) {
        var image = document.getElementById('output');
        image.src = URL.createObjectURL(event.target.files[0]);
};
</script>

    </body>
</html>
