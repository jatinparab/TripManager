<?php
require_once 'util/conn.php';
session_start();
//echo $_SESSION['isAdmin'];
if(isset($_SESSION)){
  if($_SESSION['isAdmin']==1){
    header('Location: admin.php');
  }
}else{
  header('Location: index.php');
}

$sql = "SELECT * FROM trips";
    //echo $sql;
$res = $con -> query($sql);
$res2 = $con -> query($sql);
$res3 = $con -> query($sql);




//echo $_SESSION['id'];
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
						<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="aboutus.php">About Us</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#packages">Trips</a>
          </li>
          <?php if(isset($_SESSION["id"])){ ?>
          <li class="nav-item">
						<a class="nav-link" href="booked.php">Booked Trips</a>
          </li>
          <?php } ?>
          <li class="nav-item">
						<a class="nav-link" href="contactus.php">Contact us</a>
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
		<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="img/02.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/03.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/01.jpg" alt="Third slide">
    </div>
  </div>
</div>

		<div class="container p-t-2">
			<h2 id="packages" class="display-4 text-xs-center m-y-3 text-muted">Packages</h2>
      <?php while($row = $res -> fetch_assoc()){ ?>
				<div class="col-md-6 col-lg-4">
					<div class="card">
						<img class="card-img-top img-fluid" src="<?php echo $row["img"] ?>" alt="Card image cap">
						<div class="card-block">
							<h4 class="card-title"><?php echo $row["title"] ?></h4>
							<p class="card-text">
                PRICE: Rs <?php echo $row["price"] ?> <br>
                REGION: <?php echo $row["region"] ?><br>
                DIFFICULTY: <?php echo $row["difficulty"] ?> <br>
                LENGTH: <?php echo $row["length"] ?> km <br>
                ALTITUDE: <?php echo $row["altitude"] ?> ft <br>
                DURATION: <?php echo $row["duration"] ?> days
								<button type="button" class="btn btn-info-outline btn-lg center-block m-y-1" data-toggle="modal" 
                <?php if(isset($_SESSION["id"])){ ?>
                data-target="#booknow"
                <?php }else{ ?>
                data-target="#register"
                <?php } ?>
                >Book Now</button>

                <button type="button" class="btn btn-info-outline btn-lg center-block m-y-1" data-toggle="modal" 
                <?php if(isset($_SESSION["id"])){ ?>
                data-target="#cancel"
                <?php }else{ ?>
                data-target="#register"
                <?php } ?>
                >Cancel Trip</button>
              </p>
						</div>
					</div>
        </div>
      <?php } ?>
    </div><!-- /.container -->
    
    <footer style="padding: 30px;">
        <br>
			<div class="row p-y-1">
				<div class="col-md-7">
					<ul class="nav nav-inline">
						<li class="nav-item">
							<button type="button" class="btn btn-success-outline btn-md pull-sm-right" data-toggle="modal" data-target="#register">Vendor</button>
						</li>
						<li class="nav-item">
              <button type="button" class="btn btn-success-outline btn-md pull-sm-right" data-toggle="modal" 
              
              <?php if(isset($_SESSION["id"])){ ?>
                data-target="#feedback"
                <?php }else{ ?>
                data-target="#register"
                <?php } ?>
              
              >Feedback</button>
						</li>
					</ul>
				</div>
				<div class="col-md-5 text-md-right">
					<small>&copy; 2018 XYZ</small>
				</div>
			</div>
      </footer>

    <!--===================================
      FORM MODAL
    ====================================-->

		<div id="register" class="modal fade">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header bg-info">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title text-xs-center">Sign Up</h4>
					</div>
					<div class="modal-body">
						<!-- registration form -->
					
							<h5 class="m-b-2">Basic Info</h5>
							<fieldset class="form-group">
								<label for="name">Name:</label>
								<input type="text" class="form-control" id="signup_name">
							</fieldset>
							<fieldset class="form-group ">
								<label for="mail" class="form-control-label p-l-0">Email:</label>
								<input type="email" class="form-control form-control-danger" id="signup_email">
							</fieldset>
							<fieldset class="form-group ">
								<label for="mail" class="form-control-label p-l-0">Password:</label>
								<input type="password" class="form-control form-control-danger" id="signup_password">
							</fieldset>
              <fieldset class="form-group">
               <label for="number" class="form-control-label p-l-0">Contact number:</label>
               <input type="number" class="form-control form-control-danger" id="signup_contact_number">
             </fieldset>
               <fieldset class="form-group">
                 <label for="gender">Gender</label><br>
                 <input type="radio" name="gender" value="0" checked> Male<br>
                 <input type="radio" name="gender" value="1"> Female<br>
                 <input type="radio" name="gender" value="2"> Other
               </fieldset>
							<hr class="m-b-2">
              <button data-toggle="modal" data-target="#login" >Already got an account? Click here</button>
							<button onclick="signup_click()" class="btn btn-primary btn-lg center-block">Register</button>

						<!-- /registration form -->
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->

		<div id="login" class="modal fade">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header bg-info">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title text-xs-center">Log In</h4>
					</div>
					<div class="modal-body">
						<!-- registration form -->
						
							<!-- <fieldset class="form-group">
								<label for="name">Name:</label>
								<input type="text" class="form-control" id="login_name">
							</fieldset> -->
							<fieldset class="form-group">
								<label for="mail" class="form-control-label p-l-0">Email:</label>
								<input type="email" class="form-control form-control-danger" id="login_email">
							</fieldset>
							<fieldset class="form-group">
								<label for="mail" class="form-control-label p-l-0">Password:</label>
								<input type="password" class="form-control form-control-danger" id="login_password">
							</fieldset>

							<hr class="m-b-2">
							<button id="login_button" onclick="login_click()" class="btn btn-success btn-lg center-block">Log in</button>

						<!-- /registration form -->
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
<!--Book Now-->
<div id="booknow" class="modal fade">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title text-xs-center">Book Now</h4>
      </div>
      <div class="modal-body">
        <!-- registration form -->
       
          <h5 class="m-b-2">Basic Info</h5>

         <fieldset>
           <label for="number" class="form-control-label p-l-0">Trek:</label>
           <select id="treklist">
             <option value="-1">Select your Trek</option>
             <?php 
              while($row = $res2 -> fetch_assoc()){
             ?>
             <option value="<?php echo $row["id"]; ?>"><?php echo $row["title"]; ?></option>
             <?php } ?>
           </select>
         </fieldset>
         <fieldset>
           <label for="date">Date:</label>
           <input type="date" id="trekdate" min="2018-01-04">
         </fieldset>
          <hr class="m-b-2">
          <button onclick="book_click('<?php echo $_SESSION["id"]; ?>')"  class="btn btn-primary btn-lg center-block">Book</button>

 <!-- /registration form -->
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div id="cancel" class="modal fade">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title text-xs-center">Book Now</h4>
      </div>
      <div class="modal-body">
        <!-- registration form -->
       
          <h5 class="m-b-2">Basic Info</h5>

         <fieldset>
           <label for="number" class="form-control-label p-l-0">Trek:</label>
           <select id="treklist2">
             <option value="-1">Select your Trek</option>
             <?php 
              while($row = $res3 -> fetch_assoc()){
             ?>
             <option value="<?php echo $row["id"]; ?>"><?php echo $row["title"]; ?></option>
             <?php } ?>
           </select>
         </fieldset>
         <fieldset>
           <label for="date">Date:</label>
           <input type="date" id="trekdate2" min="2018-01-04">
         </fieldset>
          <hr class="m-b-2">
          <button onclick="cancel_click('<?php echo $_SESSION["id"]; ?>')"  class="btn btn-primary btn-lg center-block">Book</button>

 <!-- /registration form -->
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div id="register" class="modal fade">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title text-xs-center">Sign Up</h4>
      </div>
      <div class="modal-body">
        <!-- registration form -->
        <form>
          <h5 class="m-b-2">Basic Info</h5>
          <fieldset class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name">
          </fieldset>
          <fieldset class="form-group has-danger">
            <label for="mail" class="form-control-label p-l-0">Email:</label>
            <input type="email" class="form-control form-control-danger" id="mail">
          </fieldset>
          <fieldset class="form-group has-danger">
            <label for="mail" class="form-control-label p-l-0">Password:</label>
            <input type="email" class="form-control form-control-danger" id="mail">
          </fieldset>
          <fieldset class="form-group has-danger">
           <label for="number" class="form-control-label p-l-0">Contact number:</label>
           <input type="number" class="form-control form-control-danger" id="mail">
         </fieldset>
           <fieldset class="form-group">
             <label for="gender">Gender</label><br>
             <input type="radio" name="gender" value="male" checked> Male<br>
             <input type="radio" name="gender" value="female"> Female<br>
             <input type="radio" name="gender" value="other"> Other
           </fieldset>
          <hr class="m-b-2">
          <button type="submit" class="btn btn-primary btn-lg center-block">Register</button>

        </form><!-- /registration form -->
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->






<div id="feedback" class="modal fade">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title text-xs-center">Feedback Form</h4>
      </div>
      <div class="modal-body">
        <!-- registration form -->
      
   
          <fieldset class="form-group">
           <label for="number" class="form-control-label p-l-0">Feedback:</label>
           <textarea id="feedback_text"  rows="4" cols="50">
           </textarea>
         </fieldset>
          <hr class="m-b-2">
          <button onclick="feedback_click('<?php echo $_SESSION["id"]; ?>')" class="btn btn-primary btn-lg center-block">Submit Feedback</button>

    <!-- /registration form -->
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

    <!-- jQuery first, then bootstrap js -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="js/custom.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
  </body>
</html>
