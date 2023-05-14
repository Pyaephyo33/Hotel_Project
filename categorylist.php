<?php
	include("connect.php");
    

	if (isset($_POST['add'])) 
	{
		$categoryname=$_POST['categoryname'];

		$add="INSERT INTO `category_db`(`CategoryName`)
             VALUES 
             ('$categoryname')";
		$recordadd=mysqli_query($connection,$add);
		if ($recordadd) 
		{

			echo "<script>window.alert('Category added.')</script>";
		}
		else
		{
			echo "<script>window.alert('Fail to add Category!')</script>";
		}
	}

	if (isset($_POST['searchcategory'])) 
			{
				$searchbtn = $_POST['searchcategory'];
				$select="SELECT * FROM category_db WHERE CategoryName LIKE '%$searchbtn%' ORDER BY CategoryID";
			}
			else 
			{
				$select="SELECT * FROM category_db ORDER BY CategoryID";
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
        <title>Category</title>

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
                    	<form action="" method="POST">

                        <h2 class="mt-4">Category</h2><br>
                        <div class="form-floating mb-3 mb-md-0">

                                                        <input class="form-control" name="categoryname" type="text" placeholder="Enter Category" required/>
                                                        <label for="Category">Category</label>
                                                    </div>
                                                    <div class="mt-4 mb-0">
                                                <div class="d-grid">
<input type="submit" class="btn btn-primary btn-block" name="add" value="Add Category">
                                            </div>
                                            </div></form>
                        </div>


                        <div class="container">
                        <br><br>
                        <div class="card mb-4">
                            <div class="card-header">
                                <form action="" method="POST">

        <table>
            <tr>
                <td class="float-left"><h4>Category List</h4></td>
                <td width="21.2%"><input class="form-control" type="text" name="searchcategory" placeholder="Search by CategoryName" value="<?php echo $searchbtn?>"></td>
                <td width="10%"><input type="submit"  class="btn btn-primary" name="" value="Search"></td>

                    
            </tr>
        </table>
        </form>
                            </div>


                            <div class="card-body">
                                <table class="table table-dark table-striped">
		<thead>
			<tr>
				<th scope="col" class="text-center">CategoryID</th>
				<th scope="col" class="text-center">Category Name</th>
				<th scope="col" class="text-center">Action</th>	

			</tr>
		</thead>
		<tbody>
			
            <?php while ($row = mysqli_fetch_object($result)) { ?>
			<tr>
					<td class="text-center"><?php echo $row->CategoryID;?></td>
					<td class="text-center"><?php echo $row->CategoryName;?></td>
					<td class="text-center">
						<?php echo '<a class="btn btn-primary" href="categoryedit.php?CategoryID='. $row->CategoryID.'">Edit</a>';?>&nbsp
						<?php echo '<a class="btn btn-danger" onclick="return confirm(\'Confirm CategoryDelete?\')" href="categorydelete.php?CategoryID='. $row->CategoryID.'">Delete</a>';?>
						
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

    if ( window.history.replaceState ) 
        {
  window.history.replaceState( null, null, window.location.href );
        }
</script>

    </body>
</html>
