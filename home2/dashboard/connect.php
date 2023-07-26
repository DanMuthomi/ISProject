<?php
	$server = 'localhost';
	$user = 'root';
	$password = '';
	$db = 'isproject';

	$connect = mysqli_connect($server,$user,$password,$db);
	if (!$connect){
		die(mysqli_error($connect));
	}
?>