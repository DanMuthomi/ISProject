<?php
	include 'connect.php';
	$id = $_GET['deleteid'];
	$sql = "DELETE FROM users WHERE uid=$id";
	$result = mysqli_query($connect,$sql);
	if ($result){
		header("location:viewAccounts.php");
	}
	else{
		echo "Not successful";
	}
?>