<?php
	session_start();
	error_reporting(0);

	include "includes/url.php";
	require_once "configurations/connection.php";

	$mod = $_GET['mod'];
	$act = $_GET['act'];

	if($mod=='beranda'){$title='Beranda';}
	if(empty($_SESSION['nama']) AND empty($_SESSION['sandi'])){header("location:masuk");}
	if(isset($_COOKIE['cookie'])){
		if(($_COOKIE['cookie']['nama']==$_SESSION['nama'])&&($_COOKIE['cookie']['sandi']==$_SESSION['sandi'])){
			print_r($_COOKIE);
			$_SESSION['masuk']=1;
			header("location:beranda");
		}
	}

	$dataIcon = mysqli_fetch_array(mysqli_query($connection,"SELECT icon FROM tabel_pengaturan"));
?>

<!doctype html>
<html lang="en">
	<head>
		<?php include "header.php"; ?>
	</head>
	<body>
		<?php include "content.php"; ?>
		<?php include "script.php"; ?>
	</body>
</html>
