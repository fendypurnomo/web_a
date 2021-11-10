<?php
	error_reporting(0);

	$hostname = "localhost";
	$username = "root";
	$password = "fendy@phpmyadmin.234";
	$database = "a";
	$connection = mysqli_connect($hostname,$username,$password,$database);

	if(mysqli_connect_errno()){die(mysqli_connect_error());}
?>
