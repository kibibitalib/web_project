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
      <h3>Renter Information</h3>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>name</th>
              <th>address</th>
              <th>age</th>
              <th>gender</th>
              <th>phone</th>
          </thead>
          <tbody>
             <?php
            include("connect.php");
            $sql="SELECT name,address, phone,gender,age FROM renter";
            $stmt=$conn->query($sql);
            while($row=$stmt->fetch(PDO::FETCH_ASSOC))
            {
              $name=$row['name'];
              $address=$row['address'];
              $age=$row['age'];
              $gender=$row['gender'];
              $phone=$row['phone'];
                echo "<tr><td>$name</td><td>$address</td><td>$age</td><td>$gender</td><td>$phone</td></tr>";
              
            }
            ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>
</body>
</html>