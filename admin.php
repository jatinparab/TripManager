<?php 
session_start();
if(isset($_SESSION)){
    if($_SESSION['isAdmin']==0){
        header('Location: index.php');
    }
}else{
    header('Location: index.php');
}
//session_destroy();


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
        <div style="padding: 100px;">
        <h1>Admin space</h1>
        </div>
		
    <!-- jQuery first, then bootstrap js -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="js/custom.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
  </body>
</html>
