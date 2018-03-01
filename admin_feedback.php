<?php 
require_once 'util/conn.php';
session_start();
if(isset($_SESSION)){
    if($_SESSION['isAdmin']==0){
        header('Location: index.php');
    }
}else{
    header('Location: index.php');
}
//session_destroy();

$sql2 = "SELECT * FROM booked_trips";
$sql5 = "SELECT * FROM trips";
$new = "SELECT * FROM feedback";
$new2 = $con -> query($new);




?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Project</title>
    <!-- bootstrap css -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
		<link rel="stylesheet" href="css/custom.css">
  </head>
  <body id="home" data-spy="scroll" data-target=".navbar" data-offset="100">

		<!-- navbar -->
		<nav class="navbar navbar-dark bg-primary navbar-fixed-top">
			<div class="container">
				<ul class="nav navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="admin.php">Home <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="admin_trips.php">Manage Available Trips<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
						<a class="nav-link" href="admin_booked.php">Manage Booked Trips <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
						<a class="nav-link" href="admin_feedback.php">Feedbacks Recieved <span class="sr-only">(current)</span></a>
					</li>
				</ul>
        <?php if(isset($_SESSION["id"])){ ?>
          <div class="pull-sm-right" style="margin-left: 10px"> Welcome, <?php echo $_SESSION["username"] ?>! </div>
          <a href="util/logout.php"><button type="button" class="btn btn-success-outline btn-md pull-sm-right" >Logout</button></a>
        <?php 
        }else{
          echo '
				<button type="button" class="btn btn-success-outline btn-md pull-sm-right" style="margin-left: 10px" data-toggle="modal" data-target="#login">Log in</button>
        <button type="button" class="btn btn-success-outline btn-md pull-sm-right" data-toggle="modal" data-target="#register">Sign up</button>';
        }
        ?>
			</div>
		</nav><!-- /navbar -->

		<!-- carousel -->
        <div style="padding: 100px;padding-bottom:50px;">
        <h2>Feedbacks Recieved</h2>
        <table class="table table-bordered table-hover">
          
          <thead>
            
            <tr>
              <th>Feedback</th>
              <th>Sent By</th>
            </tr>
          </thead>
          <tbody>
              <?php while($row = $new2 -> fetch_assoc()){ ?>
            <tr>
              <td><?php echo $row["content"]; ?></td>
              <td><?php 
              $id_owner = $row["owner"];
              $sql = "SELECT * FROM users WHERE id='$id_owner'";
              $res = $con -> query($sql);
              $row2 = $res -> fetch_assoc();

              echo $row2["username"];
              
              ?></td>
              
            </tr>

            <?php } ?>
            
          </tbody>
          
        </table>
        </div>

   
		
    <!-- jQuery first, then bootstrap js -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="js/custom.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
  </body>
</html>
