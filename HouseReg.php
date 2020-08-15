<!-- <?php 
//session_start();
$userID=$_SESSION['userID'];
?> -->
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<title>house rental</title>
  		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  		<script type="text/javascript" src="js/jquery.min.js"></script>
  		<script type="text/javascript" src="js/bootstrap.min.js"></script>
  		<link rel="stylesheet" type="text/css" href="style.css">
	
</head>
<body>
	<header class="header">
        	<nav class="navbar navbar-styl">
        		<div class="container">
        			<div class="container">
        				<div class="navbar-header">
        					<h3>HOUSE RENTAL MANAGEMENT SYSTEM</h3>
        				</div>
        				<ul class="nav navbar-nav navbar-right">
        					<li>
                            	<button type="button" class="btn btn-default"><a href="logout_handler.php" style="">sign out</a></button>
                        	</li>
                        </ul>
        				</div>
        			</div>
        		</nav>
        	</nav>
        	<div class="container">
		<div class="row">
		<div class="col-sm-2">
			
		</div>
		<div class="col-sm-8">
			<center><h4>HOUSE REGISTRATION</h4></center>
			<form method="POST" action="" enctype="multipart/form-data">
  				<div class="form-group">
    				<label for="house">House Number:</label>
    				<input type="text" class="form-control" id="house" name="num">
  				</div>
  				<div class="form-group">
    				<label for="hname">House location:</label>
    				<input type="text" class="form-control" id="hname" name="loc">
  				</div>
  				<div class="form-group">
    				<label for="htype">House Type:</label>
    				<select class="form-control" id="htype" name="type">
    					<option value="flat">flat</option>
    					<option value="cottage">cottage</option>
    					<option value="appartement">appartement</option>
    					<option value="bangalow">bangalow</option>
  					</select>
  				</div>
  				<div class="form-group">
    				<label for="cost">House cost:</label>
    				<input type="text" class="form-control" id="cost" name="cost">
  				</div>
  				<div class="form-group">
  					<label for="desc">Short Description:</label>
  					<textarea class="form-control" rows="5" id="desc" name="desc"></textarea>
				</div> 
        <div class="form-group">
            <label>Picture</label>
            <input type="file" name="pic" class="form-control" >
        </div> 

  				<center><button type="submit" class="btn btn-default" name="add" id="sub">Add</button>&nbsp &nbsp &nbsp &nbsp
            &nbsp &nbsp
            <button type="button" class="btn btn-default"><a href="registeredHouse.php" style="">Finish</a></button>
          </center>
			</form> 
		</div>
	</div>
</div>
        </header>
<div>
	<footer class="footer mt-auto py-3">
            <div class="container">
                <span class="text-muted"><center><font color="white">copright(c) 2020</font></center></span>
            </div>
            
    </footer>
</div>
</body>
</html>
<?php
include 'connect.php';
if(isset($_POST['add']))
{
  $Numb=$_POST['num'];
  $loca=$_POST['loc'];
  $type=$_POST['type'];
  $cost=$_POST['cost'];
  $descr=$_POST['desc'];
  $images = $_FILES["pic"]["name"];
  $target = "image/".basename($images);
  $sql="INSERT INTO house(houseNo,type,location,owner,description,cost,picture) VALUES(:houseNo, :type, :location,:owner, :description, :cost, :picture)";
  $stmt=$conn->prepare($sql);
  $stimt=$stmt->execute(array(':houseNo' => $Numb,':type' => $type,':location' => $loca,':owner'=>$userID,':description' => $descr,':cost' => $cost,':picture' => $target));
  move_uploaded_file($_FILES['pic']['tmp_name'], $target);
}
?>
