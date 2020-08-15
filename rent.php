<?php
  	session_start();
  	$houseNo=$_SESSION['houseId'];  
?>
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
        	<nav class="navbar navbar-style">
        		<div class="container">
        			<div class="navbar-header">
        				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#micon">
        					<span class="icon-bar"></span>
        					<span class="icon-bar"></span>
        					<span class="icon-bar"></span>
        				</button>
        				<a href=""><img class="logo" src="index.png"></a>
        			</div>
        			<div class="collapse navbar-collapse" id="micon">
        			<ul class="nav navbar-nav navbar-right">
                        <li>
                            <button type="button" class="btn btn-info btn-lg"><a href="frame.php">back</a></button>
                        </li>
        			</ul>
        			</div>
        		</div>
        	</nav>
   <div class="container" style="background-color: #f1f1f1">
    <div class="row">
        <div class="col-sm-2">

        </div>
        <div class="col-sm-8">
        	<center><h3>RENT NOW</h3></center>
        	<form method="POST" action="" enctype="multipart/form-data">
  				<div class="form-group">
    				<label for="name">name:</label>
    				<input type="text" class="form-control" id="name" name="name" required>
  				</div>
  				<div class="form-group">
    				<label for="adres">address:</label>
    				<input type="text" class="form-control" id="adres" name="adres" required>
  				</div>
  				<div class="form-group">
    				<label for="age">age:</label>
    				<input type="number" class="form-control" id="age" name="age" required>
  				</div>
  				<div class="form-group">
                    <label for="rad">Gender:</label>
                    <div class="radio">
                    	<label><input type="radio" name="gender" value="male" checked>Male</label>
                        <label><input type="radio" name="gender" value="female">Female</label>
                    </div>
                </div>
                <div class="form-group">
    				<label for="phone">Phone number:</label>
    				<input type="text" class="form-control" id="phone" name="phone" required>
  				</div>
  				<div class="form-group">
    				<label for="job">Job:</label>
    				<input type="text" class="form-control" id="job" name="job" required>
  				</div>
  				<div class="form-group">
    				<label for="rtime">Renting time:</label>
    				<input type="text" class="form-control" id="rtime" name="rtime" required>
  				</div>

  				<center><button type="submit" class="btn btn-default" name="rent" id="rent">rent</button>
          </center>
			</form> 
        			</div>
        		</div>
        	</div>
</body>
</html>
<?php
include("connect.php");
if(isset($_POST['rent']))
{
  $names=$_POST['name'];
  $adress=$_POST['adres'];
  $ages=$_POST['age'];
  $phon=$_POST['phone'];
  $time=$_POST['rtime'];
  $gende=$_POST['gender'];
  $job=$_POST['job'];
  $id=$names.$ages;
  $sql="INSERT INTO tenant(tID,tname,taddress,tphoneNo,tGender,tage,job,rentingTime,houseNo) VALUES(:tID,:tname, :taddress, :tphoneNo, :tGender, :tage, :job, :rentingTime, :houseNo)";
  $stmt=$conn->prepare($sql);
  $stimt=$stmt->execute(array(':tID'=>$id,':tname' => $names,':taddress' => $adress,':tphoneNo' => $phon,':tGender' => $gende,':tage' => $ages,':job' => $job,':rentingTime' => $time,':houseNo' => $houseNo));
  header('location:frame.php');
}  
?>