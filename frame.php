<!DOCTYPE html>
<html>
<html lang="en">
</body>
</html>
    <head>
        <meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<title>house rental</title>
  		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  		<script type="text/javascript" src="js/jquery.min.js"></script>
  		<script type="text/javascript" src="js/bootstrap.min.js"></script>
  		<link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <?php
        include("connect.php");
        session_start();
        $sql="SELECT houseNo,type,location,cost,picture,description FROM house";
        $stmt=$conn->query($sql);
        ?>
    <body>
        <!--<header class="header">-->
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
                            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#signUp">sign up</button>
                        </li>
                        <li>
                            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#login">login</button>
                        </li>
        			</ul>
        			</div>
        		</div>
        	</nav>
            <div class="container">
              <div class="row">
                <?php
                while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                    //$getID=$stmt->fetch();
                    $_SESSION['houseId']=$row['houseNo'];
                ?>
                <div class="col-md-4">
                  <div class="thumbnail" style="height: 300px;">
                    <a href="rent.php" target="_blank"> 
                      <img src="<?php echo $row['picture']?>" alt="Lights" style="width:100%; height: 200px">
                      
                      <div class="caption">
                        <p>
                            <?php 
                            echo $row['type'];
                            echo "<br>cost: ";
                            echo $row['cost'];
                            echo "per month <br> located at ";
                            echo $row['location'];
                            echo "<br> description ";
                            echo $row['description'];
                            ?></p>
                      </div>
                    </a>
                  </div>
                </div>
                <?php 
            }
            ?>
              </div>
            </div>

        <!-- </header> -->
        <div class="container">
            <div class="modal fade" id="login" role="dialog">
                <div class="modal-dialog">
                    <form method="POST" action="login_handler.php">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title" align="center">LOGIN</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="email">User Name:</label>
                                <input type="text" class="form-control" id="email" placeholder="Enter name" name="name">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Password:</label>
                                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" name="remember"> Remember me</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <center><button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn primary" name="submit" id="login">login</button>
                            </center>
                        </div>
                    </div>
                </form>
      
                </div>
            </div>
            <div class="modal fade" id="signUp" role="dialog">
                <div class="modal-dialog">
                    <form method="POST" action="">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: grey;">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title" align="center">REGISTER</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter your name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="address">Address:</label>
                                <input type="text" class="form-control" id="address" placeholder="Enter address" name="address" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Age:</label>
                                <input type="number" class="form-control" id="age" placeholder="Enter your age" name="age" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone number:</label>
                                <input type="text" class="form-control" id="phone" placeholder="Enter Phone number" name="phone" required>
                            </div>
                            <div class="form-group">
                                <label for="rad">Gender:</label>
                                <div class="radio">
                                    <label><input type="radio" name="gender" value="male" checked>Male</label>
                                    <label><input type="radio" name="gender" value="female">Female</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="pwd">Password:</label>
                                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" required>
                            </div>
                            <div class="form-group">
                                <label for="pswd">Confirm Password:</label>
                                <input type="password" class="form-control" id="pswd" placeholder="Confirm password" name="pswd" required>
                            </div>
                            

                        </div>
                        <div class="modal-footer">
                            <center><button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn primary" name="reg" onclick="validate()">register</button>
                            </center>
                        </div>

                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
        <footer class="footer mt-auto py-3">
            <div class="container">
                <span class="text-muted"><center><font color="white">copright(c) 2020</font></center></span>
            </div>
            
        </footer>
        <script type="text/javascript">
            var pass=document.getElementById('pwd');
            var phon=document.getElementById('Phone');
            var vpass=document.getElementById('pswd');
            function validate(){
                if(pass.value.length!==8){
                    alert("password must be atleast 8 character");
                    return false;
                }
                else if(phon.value!=/[09]/)
                {
                    alert("only number is allowed");
                    return false;
                } else if(vpass.value!=pass.value){
                    alert("password and confirm password must match");
                    return false;
                }
            }
        </script>
        <?php
include("connect.php");
if(isset($_POST['reg']))
{
  $names=$_POST['name'];
  $adress=$_POST['address'];
  $ages=$_POST['age'];
  $phon=$_POST['phone'];
  $pass=$_POST['pwd'];
  $gende=$_POST['gender'];
  $id=$names.$ages;
  $sql="INSERT INTO renter(RID,name,address,phone,gender,age,password) VALUES(:RID,:name, :address, :phone, :gender, :age, :password)";
  $stmt=$conn->prepare($sql);
  $stimt=$stmt->execute(array(':RID'=>$id,':name' => $names,':address' => $adress,':phone' => $phon,':gender' => $gende,':age' => $ages,':password' => $pass));
  echo '<script type="text/javascript">';
  echo 'alert(" success! \n use your name + your age as user name \n example ali19");';
  echo "</script>";
}
?>
    </body>
</html>