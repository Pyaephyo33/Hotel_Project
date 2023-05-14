<?php
    include("connect.php");
    

    $RoomID=$_GET['RoomID'];
    $select="SELECT * FROM room_db
            WHERE RoomID='$RoomID'";
    $result=mysqli_query($connection,$select);
    $callvalue=mysqli_fetch_assoc($result);

    if (isset($_POST['edit'])) 
    {        
        $roomno=$_POST['roomno'];
        $filename = $_FILES['myfile']['name'];
        $upload = 'uploads/' . $filename;
        $file = $_FILES['myfile']['tmp_name'];
        $roomtype=$_POST['roomtype'];
        $category=$_POST['category'];
        $price=$_POST['price'];
        if ($filename!="") {
            $update = "UPDATE `room_db` 
                        SET 
                        `RoomNo`='$roomno',
                        `RoomImage`='$filename',
                        `RoomType`='$roomtype',
                        `CategoryID`='$category',
                        `Prices`='$price'
                        WHERE RoomID='$RoomID'";

                move_uploaded_file($file, $upload);
        } 
        else
        {
            $update = "UPDATE `room_db` 
                        SET 
                        `RoomNo`='$roomno',
                        `RoomType`='$roomtype',
                        `CategoryID`='$category',
                        `Prices`='$price'
                        WHERE RoomID='$RoomID'";
                move_uploaded_file($file, $upload);
        }
        $recordupdate=mysqli_query($connection,$update);
            if ($recordupdate) 
            {
                echo "<script>window.alert('HotelRoom Edited.')</script>";
                echo "<script>window.location='adminhome.php'</script>";
            }
            else {
                echo (mysqli_error($connection));
            }
        
    }
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
        <title>HotelRoom Edit</title>
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
                        <h2 class="mt-4">Edit Room</h2>
                        <br>

                        <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="roomno" type="text" placeholder="Enter RoomNo"value="<?= $callvalue['RoomNo'] ?>" required/>
                                                        <label for="Category">RoomNo</label><br>
                                                    </div>

                                                    <div>
                                                        <input type="file" accept="image/*" name="myfile" id="file"  onchange="loadFile(event)" style="display: none;">
                <label for="file" class="btn btn-primary" style="cursor: pointer;">Upload RoomImage </label><br>
<br><img src="uploads/<?php echo $callvalue['RoomImage']; ?>" id="output" width="250" height="300" /><br>
                                                    </div><br>

                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="roomtype" type="text" placeholder="Enter Room Type"value="<?= $callvalue['RoomType'] ?>" required/>
                                                        <label for="Category">RoomType</label><br>
                                                    </div>

                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <select class="form-control" name="category" required>
                                                            <?php while ($row = mysqli_fetch_array($resultcategory)):;?>
                <option value="<?php echo $row[0];?>"><?php echo $row[1];?></option>
                <?php endwhile; ?>
                                                        </select>
                                                        <label for="Category">Category</label><br>
                                                    </div>

                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="price" type="text"value="<?= $callvalue['Prices'] ?>" placeholder="Enter Price" required/>
                                                        <label for="Category">Price</label><br>
                                                    </div>

                                                    <div class="mt-4 mb-0">
                                                <div class="d-grid">
<input type="submit" class="btn btn-primary btn-block" name="edit" value="Edit HotelRoom"><br>
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
