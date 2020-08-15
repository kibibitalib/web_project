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
<?php
include("header.php");
include("sidebar.php");
?>
<div class="main col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h2>Tenant Information</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>name</th>
              <th>address</th>
              <th>age</th>
              <th>gender</th>
              <th>phone</th>
              <th>job</th>
              <th>renting period</th>
              <th>rented house</th>
            </tr>
          </thead>
          <tbody>
             <?php
            include("connect.php");
            $sql="SELECT tName,tAddress,tAge,tGender,tPhoneNo,job,rentingTime,houseNo FROM tenant";
            $stmt=$conn->query($sql);
            while($row=$stmt->fetch(PDO::FETCH_ASSOC))
            {
              $name=$row['tName'];
              $address=$row['tAddress'];
              $age=$row['tAge'];
              $gender=$row['tGender'];
              $phone=$row['tPhoneNo'];
              $job=$row['job'];
              $time=$row['rentingTime'];
              $house=$row['houseNo'];

                echo "<tr><td>$name</td><td>$address</td><td>$age</td><td>$gender</td><td>$phone</td><td>$job</td><td>$time</td><td>$house</td></tr>";
              
            }
            ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>
</body>
</html>