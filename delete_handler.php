<?php
if(isset($_GET['id'])){
include 'connect.php';

	$sql="DELETE FROM house WHERE houseNo=:num";
	$stmt=$conn->prepare($sql);
	$stmt->execute(array(':num'=>$_GET['id']));
	header("location:registeredHouse.php");
}
?>