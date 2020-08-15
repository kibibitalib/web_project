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
  </style>
</head>
<body><div>
        	<nav class="navbar navbar-styl">
        		<div class="container">
        			<div class="container">
        				<div class="navbar-header">
        					<h3>HOUSE RENTAL MANAGEMENT SYSTEM</h3>
        				</div>
        				<ul class="nav navbar-nav navbar-right">
        					<li>
                            	 <a href="logout_handler.php"  class="btn btn-primary">log out</a>
                        	</li>
                        </ul>
        				</div>
        			</div>
        		</nav>
        	</nav>
        </div>
        	<div class="container">
		<div class="row">
		<div class="col-sm-2">
			
		</div>
		<div class="col-sm-8">
			<center><h4>REGISTERED HOUSE</h4></center>
			
		</div>
	</div>
</div>
<div class="container">
<div class="main col-md-9 ml-sm-auto col-lg-12 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>HOUSE NUMBER</th>
              <th>TYPE</th>
              <th>LOCATION</th>
              <th>DESCRIPTION</th>
              <th>COST</th>
              <th>PICTURE</th>
              <th>UPDATE</th>
              <th>DELETE</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include("connect.php");
            $sql="SELECT houseNo,type,location,description,cost,picture FROM house";
            $stmt=$conn->query($sql);
            while($row=$stmt->fetch(PDO::FETCH_ASSOC))
            {
              $num=$row['houseNo'];
              $type=$row['type'];
              $loc=$row['location'];
              $descr=$row['description'];
              $cost=$row['cost'];
              $pic=$row['picture'];
              
            ?>
            <tr><td><?php echo $num?></td><td><?php echo $type?></td><td><?php echo $loc?></td><td><?php echo $descr?></td><td><?php echo $cost?></td><td><img src='<?php echo $pic?>'></td><td><button class='btn btn-primary' data-toggle='modal' data-target='#<?php echo $num?>'>Edit</button>

              <td><a href="delete_handler.php?id=<?php echo $num;?>" class="btn btn-primary" onclick="confirm('are you sure you whant to delete')">delete</a></td></td></tr>
            
            <div class="modal fade" id="<?php echo $num ?>" role="dialog">
                <div class="modal-dialog">
                    <form method="POST" action="update-handler.php">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title" align="center">LOGIN</h4>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="" enctype="multipart/form-data">
                          <div class="form-group">
                            <label for="house">House Number:</label>
                            <input type="text" class="form-control" id="house" name="num" value="<?php echo $num?>">
                          </div>
                          <div class="form-group">
                            <label for="hname">House location:</label>
                            <input type="text" class="form-control" id="hname" name="loc" value="<?php echo $type?>">
                          </div>
                          <div class="form-group">
                            <label for="htype">House Type:</label>
                            <select class="form-control" id="htype" name="type"value="<?php echo $loc?>">
                              <option value="flat">flat</option>
                              <option value="cottage">cottage</option>
                              <option value="appartement">appartement</option>
                              <option value="bangalow">bangalow</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="cost">House cost:</label>
                            <input type="text" class="form-control" id="cost" name="cost" value="<?php echo $cost?>">
                          </div>
                          <div class="form-group">
                            <label for="desc">Short Description:</label>
                            <textarea class="form-control" rows="5" id="desc" name="desc" ><?php echo $descr?></textarea>
                        </div>  

                          <center><button type="submit" class="btn btn-default" name="update" id="sub">update</button>
                          </center>
                      </form>
                      </div>
            </div>
          </form>
            <?php
             } 
            ?>  
        </div> 
      </div>
      </tbody>
      </table>
      </div>
      </div>
  </div>
</div>
	<footer class="footer mt-auto py-3">
            <div class="container">
                <span class="text-muted"><center><font color="white">copright(c) 2020</font></center></span>
            </div>
            
</footer>
</html>
