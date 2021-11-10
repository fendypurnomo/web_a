<?php
	echo "<script src='$base_url"."main/js/jquery-3.3.1.min.js'></script>";
	echo "<script src='$base_url"."main/js/popper.min.js'></script>";
	echo "<script src='$base_url"."main/js/bootstrap.min.js'></script>";
	echo "<script src='$base_url"."main/js/jquery.cookie.js'></script>";
	echo "<script src='$base_url"."assets/node_modules/waves/dist/waves.min.js'></script>";
	echo "<script src='$base_url"."assets/node_modules/jqueryValidation/dist/jquery.validate.js'></script>";
	echo "<script src='$base_url"."main/js/custom.js'></script>";

	if($mod=='' OR $mod=='masuk'){echo "<script src='$base_url"."main/js/validate.login.js'></script>";}
?>
