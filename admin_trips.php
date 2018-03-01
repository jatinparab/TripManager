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
$sql = "SELECT * FROM users WHERE isAdmin='0'";
$sql2 = "SELECT * FROM booked_trips";
$sql5 = "SELECT * FROM trips";
$sql6 = "SELECT * FROM trips";
$res = $con -> query($sql);
$res2 = $con -> query($sql2);
$res5 = $con -> query($sql5);
$res6 = $con -> query($sql6);



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



    <div style="padding-top:100px;padding-left:100px; padding-right:100px;padding-bottom:20px;">
        <h2>Trips Available Currently</h2>
        <table class="table table-bordered table-hover">
          
          <thead>
            
            <tr>
              <th>Trip Name</th>
              <th>Price</th>
              <th>Region</th>
              <th>Difficulty</th>
              <th>Length</th>
              <th>Alititude</th>
              <th>Duration</th>
            </tr>
          </thead>
          <tbody>
              <?php while($row5 = $res5 -> fetch_assoc()){ ?>
            <tr>
              <td><?php   
              echo $row5["title"];
              ?>
              
            </td>
             
            <td>
            <?php 
              echo $row5["price"];
              ?>
            </td>
              
            <td>
           
              <?php   
              echo $row5["region"];
              ?>
              
            </td>
            
              <td>
            <?php 
              echo $row5["difficulty"];
              ?>
            </td>
              
              <td><?php   
              echo $row5["length"];
              ?>
              
            </td>
              
            <td>
            <?php 
              echo $row5["altitude"];
              ?>
            </td>
            
            
              <td><?php   
              echo $row5["duration"];
              ?>
              
            </td>
                    
            </tr>

            <?php } ?>
            
          </tbody>
          
        </table>
    </div>
    <div id="manage_buttons">
        
        <button type="button" class="flexboi1 btn btn-large btn-success" data-toggle="modal" data-target="#add">Add Trips</button>
        <button type="button" class="flexboi2 btn btn-large btn-danger" data-toggle="modal" data-target="#remove">Remove Trip</button>
        
    </div>
        
    





    <div id="add" class="modal fade">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header bg-info">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title text-xs-center">Add New Trip</h4>
					</div>
					<div class="modal-body">
						
							<fieldset class="form-group">
								<label for="mail" class="form-control-label p-l-0">Trip Name:</label>
								<input type="text" class="form-control form-control-danger" id="name">
							</fieldset>
							<fieldset class="form-group">
								<label for="mail" class="form-control-label p-l-0">Image Link:</label>
								<input type="text" class="form-control form-control-danger" id="img">
                            </fieldset>
                            <fieldset class="form-group">
								<label for="mail" class="form-control-label p-l-0">Price:</label>
								<input type="text" class="form-control form-control-danger" id="price">
                            </fieldset>
                            <fieldset class="form-group">
								<label for="mail" class="form-control-label p-l-0">Region:</label>
								<input type="text" class="form-control form-control-danger" id="region">
                            </fieldset>
                            <fieldset class="form-group">
								<label for="mail" class="form-control-label p-l-0">Difficulty:</label>
								<input type="text" class="form-control form-control-danger" id="difficulty">
                            </fieldset>
                            <fieldset class="form-group">
								<label for="mail" class="form-control-label p-l-0">Length:</label>
								<input type="text" class="form-control form-control-danger" id="length">
                            </fieldset>
                            <fieldset class="form-group">
								<label for="mail" class="form-control-label p-l-0">Alititude:</label>
								<input type="text" class="form-control form-control-danger" id="altitude">
                            </fieldset>
                            <fieldset class="form-group">
								<label for="mail" class="form-control-label p-l-0">Duration:</label>
								<input type="text" class="form-control form-control-danger" id="duration">
							</fieldset>

							<hr class="m-b-2">
							<button onclick="add_click()" class="btn btn-success btn-lg center-block">Add New Trip</button>

						<!-- /registration form -->
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        





    <div id="remove" class="modal fade">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header bg-info">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title text-xs-center">Remove Trip</h4>
					</div>
					<div class="modal-body">
                    <fieldset>
                        <label for="number" class="form-control-label p-l-0">Trek:</label>
                        <select id="treklist">
                            <option value="-1">Select your Trek</option>
                            <?php 
                            while($row6 = $res6 -> fetch_assoc()){
                            ?>
                            <option value="<?php echo $row6["id"]; ?>"><?php echo $row6["title"]; ?></option>
                            <?php } ?>
                        </select>
                    </fieldset>
							
							<hr class="m-b-2">
							<button  onclick="remove_click()" class="btn btn-danger btn-lg center-block">Remove</button>

						<!-- /registration form -->
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div>

    <!-- jQuery first, then bootstrap js -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="js/custom.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
  </body>
</html>


