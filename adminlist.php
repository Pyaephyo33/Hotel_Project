<?php
	include("connect.php");

	
        	if (isset($_POST['searchuser'])) 
        			{
        				$searchbtn = $_POST['searchuser'];
        				$select="SELECT * FROM user_db WHERE RoleID=1 AND (FullName LIKE '%$searchbtn%' OR User_email LIKE '%$searchbtn%')";
        			}
        			else
        			{
        				$select="SELECT * FROM user_db WHERE RoleID=1 ORDER BY UserID";
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
        <title>Admin List</title>
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
                        
                        <br>
                        <div class="card mb-4">
                            <div class="card-header">
                                <form action="" method="POST">
        <table>
            <tr>
                <td class="float-left"><h4>Admin List</h4>
                </td>

                <td width="21.2%">
                	<input class="form-control" type="text" name="searchuser" placeholder="Search by Email or Name" value="<?php echo $searchbtn?>"></td>

                <td width="10%"><input type="submit"  class="btn btn-primary" name="" value="Search"></td>   
            </tr>
        </table>
        </form>
                            </div>

                            <div class="card-body">
                                <table class="table table-dark table-striped">
		<thead>
			<tr>
				
				<th scope="col" class="text-center">Full Name</th>
				<th scope="col" class="text-center">Email</th>
                <th scope="col" class="text-center">Address</th>
                <th scope="col" class="text-center">Contact No</th>
				<th scope="col" class="text-center">Action</th>	

			</tr>
		</thead>
		<tbody>
			<?php while ($row = mysqli_fetch_object($result)) { ?>
			<tr>
					
					<td class="text-center"><?php echo $row->FullName;?></td>
					<td class="text-center"><?php echo $row->User_email;?></td>
                    <td class="text-center"><?php echo $row->Address;?></td>
                    <td class="text-center"><?php echo $row->Contact_No;?></td>
					<td class="text-center">
			<?php echo '<a class="btn btn-primary" href="admindetail.php?UserID='. $row->UserID.'">Detail</a>';?>&nbsp
            <?php echo '<a class="btn btn-primary" href="admininfo.php?UserID='. $row->UserID.'">Update</a>';?>&nbsp
            <?php echo '<a class="btn btn-danger" onclick="return confirm(\'Confirm Account Delete?\')" href="adminaccountdelete.php?UserID='. $row->UserID.'">Delete</a>';?>
						
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
