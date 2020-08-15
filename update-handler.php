<?php 
include 'connect.php';
session_start();
$userID=$_SESSION['userID'];
 if(isset($_POST['update']))
 {
  $Numb=$_POST['num'];
  $loca=$_POST['loc'];
  $type=$_POST['type'];
  $cost=$_POST['cost'];
  $descr=$_POST['desc'];
  $sql="update  house set type=:type, location=:location, owner=:owner, description=:description, cost=:cost where houseNo='$Numb'";
  $stmt=$conn->prepare($sql);
  $stimt=$stmt->execute(array(':type' => $type,':location' => $loca,':owner'=>$userID,':description' => $descr,':cost' => $cost));
  header("location:registeredHouse.php");
 }
?>