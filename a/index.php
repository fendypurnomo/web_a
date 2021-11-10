<?php
	session_start();
	error_reporting(0);

	include "includes/url.php";
	require_once "configurations/connection.php";

	$mod = $_GET['mod'];

	if(isset($_COOKIE['cookie'])){
		if(($_COOKIE['cookie']['nama']==$_SESSION['nama'])&&($_COOKIE['cookie']['sandi']==$_SESSION['sandi'])&&($_SESSION['masuk']==1)){
			header("location:beranda");
		}
	}
	if($mod=='masuk' OR $mod==''){$title='Masuk';}

	$dataIcon = mysqli_fetch_array(mysqli_query($connection,"SELECT icon FROM tabel_pengaturan"));
?>

<!doctype html>
<html lang="en">
	<head>
		<?php include "header.php"; ?>
	</head>
	<body class="login">
		<?php include "login.php"; ?>
		<?php include "script.php"; ?>
	</body>
</html>
