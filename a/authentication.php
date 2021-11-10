<?php
	session_start();
	date_default_timezone_set("Asia/Jakarta");

	include "configurations/connection.php";
	include "includes/operating_system.php";
	include "includes/browser.php";

	$nama		= $_POST['nama'];
	$sandi	= $_POST['sandi'];
	$ingat	= $_POST['ingat'];

	function anti_injection($data){
		$filter = mysqli_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ent_quotes))));
		return $filter;
	}

	$nama		= anti_injection($nama);
	$sandi	= anti_injection($sandi);
	$nama		= FILTER_INPUT(INPUT_POST,"nama",FILTER_SANITIZE_STRING);
	$sandi	= FILTER_INPUT(INPUT_POST,"sandi",FILTER_SANITIZE_STRING);
	$sandi	= md5($sandi);

	$sql		= "SELECT * FROM tabel_pengguna WHERE nama_pengguna='$nama' OR email='$nama' AND sandi='$sandi' AND blokir='0' AND aktivasi='1'";
	$query	= mysqli_query($connection,$sql) or die(mysqli_error());
	$ada		= mysqli_num_rows($query);
	$row		= mysqli_fetch_array($query);

	if($ada == 1){
		if($sandi == $row['sandi']){
			if($row['blokir'] == '0'){
				if($row['aktivasi'] != 1){
					echo "belum_aktivasi";
				} else {
					$_SESSION['id_pengguna']		= $row['id_pengguna'];
					$_SESSION['nama_pengguna']	= $row['nama_pengguna'];
					$_SESSION['email']					= $row['email'];
					$_SESSION['sandi']					= $row['sandi'];
					$_SESSION['level']					= $row['level'];
					$_SESSION['blokir']					= $row['blokir'];
					$_SESSION['nama']						= $nama;
					$_SESSION['masuk']					= 1;

					$sesi_lama = session_id();
					session_regenerate_id();
					$sesi_baru = session_id();

					$sqlUpdate = "UPDATE tabel_pengguna SET aktif='1',sistem_operasi='$sistem_operasi',peramban='$peramban',sesi='$sesi_baru',tanggal_masuk='".date('Y-m-d h:i:s')."' WHERE nama_pengguna='$nama' OR email='$nama'";
					mysqli_query($connection,$sqlUpdate) or die(mysqli_error());
					echo "berhasil";

					if(!empty($ingat)){
						setcookie("cookie[nama]",$nama,time()+(60*60*24),"/");
						setcookie("cookie[sandi]",$sandi,time()+(60*60*24),"/");
					} else {
						setcookie("cookie[nama]","",0,"/");
						setcookie("cookie[sandi]","",0,"/");
					}
				}
			} else {echo "diblokir";}
		} else {echo "sandi_salah";}
	} else {echo "tidak_ada";}
	mysqli_close();
?>
