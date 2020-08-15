<?php
session_start();
if(isset($_POST["submit"])){
	require_once('connect.php');
	$name=$_POST['name'];
	$pass=$_POST['pwd'];
	$query="SELECT * FROM admin where name='$name' and password='$pass'";
	$query1="SELECT RID,password FROM renter where RID='$name' and password='$pass'";
	$stmt=$conn->prepare($query);
	$res=$conn->prepare($query1);
	$stmt->execute();
	$res->execute();
	if($stmt->rowCount()>0){
		$getUser=$stmt->fetch();
		$_SESSION['adminID']=$getUser['ID'];
		header("location:dashboard.php");

	}
	elseif ($res->rowCount()>0) {
		$getUser=$res->fetch();
		$_SESSION['userID']=$getUser['RID'];
		//echo $_SESSION['userID'];
		header("location:HouseReg.php");
	}
	else{
		header("location:frame.php");
	}
}
?>