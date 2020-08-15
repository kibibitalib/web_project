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
      <h1>House Information</h1>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>house number</th>
              <th>type</th>
              <th>location</th>
              <th>cost</th>
              <th>house</th>
            </tr>
          </thead>
          <tbody>
             <?php
            include("connect.php");
            $sql="SELECT houseNo,type,location,cost,picture,phone FROM house,renter WHERE owner=RID ";
            $stmt=$conn->query($sql);
            while($row=$stmt->fetch(PDO::FETCH_ASSOC))
            {
              $num=$row['houseNo'];
              $type=$row['type'];
              $loc=$row['location'];
              $cost=$row['cost'];
              $pic=$row['picture'];

                echo "<tr><td>$num</td><td>$type</td><td>$loc</td><td>$cost</td><td><img src='$pic'></td><td>
                </td></tr>";
              
            }
            ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>
</div>
</body>
</html>