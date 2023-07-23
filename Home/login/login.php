<?php
session_start();
include "db_conn.php";

if (isset($_POST['uname']) &&isset($_POST['password'])) {
	function validate($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
	}
}

$uname = validate($_POST['uname']);
$pass = validate($_POST['password']);

if (empty($uname)) {
	header("location: indexphp?error=Username is required");
	exit();
}
else if (empty($pass)) {
	header("location: index.php?error=Password is required");
	exit();
}

$sql = "SELECT * FROM user WHERE uName='$uname' AND password='$pass'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) === 1) {
	$row = mysqli_fetch_assoc($result);
	if ($row['uName'] === $uname && $row['password'] === $pass) {
		echo "Logged In";
		$_SESSION['uName'] = $row['uName'];
		$_SESSION['fullName'] = $row['fullName'];
		$_SESSION['uid'] = $row['uid'];
		header("location: home.php");
		exit();
	}
	else{
		header("location: index.php?error=Incorrect username or password");
		exit();
	}
}
else{
	header("location: index.php");
	exit();
}