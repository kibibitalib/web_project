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
  
  <div class="main col-md-8 ml-sm-auto col-lg-9 px-md-3">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1>Dashboard</h1>
      <h3>Rented House</h3>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>type</th>
              <th>location</th>
              <th>cost</th>
              <th>OWNER</th>
              <th>Owner phoneNo</th>
              <th>house</th>
              <th>tenant</th>
            </tr>
          </thead>
          <tbody>
             <?php
            include("connect.php");
            $sql="SELECT type,location,cost,picture,name,phone,tName FROM house,renter,tenant WHERE owner=RID and tenant.houseNo=house.houseNo ";
            $stmt=$conn->query($sql);
            while($row=$stmt->fetch(PDO::FETCH_ASSOC))
            {
              $type=$row['type'];
              $loc=$row['location'];
              $cost=$row['cost'];
              $pic=$row['picture'];
              $name=$row['name'];
              $phone=$row['phone'];
              $tname=$row['tName'];
                echo "<tr><td>$type</td><td>$loc</td><td>$cost</td><td>$name</td><td>$phone</td><td><img src='$pic'></td><td>$tname</td></tr>";
              
            }
            ?>

            </tbody>
          </table>
        </div>
      </div>
</div>
</body>
</html>