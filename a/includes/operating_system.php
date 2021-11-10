<?php
	function operating_system($userAgent){
		$os_array = array (
			'Windows 3.11' => 'Win16',
			'Windows 95' => '(Windows 95)|(Win95)|(Windows_95)',
			'Windows 98' => '(Windows 98)|(Win98)',
			'Windows ME' => 'Windows ME',
			'Windows 2000' => '(Windows NT 5.0)|(Windows 2000)',
			'Windows XP' => '(Windows NT 5.1)|(Windows XP)',
			'Windows Server 2003/XP' => '(Windows NT 5.2)',
			'Windows Vista' => '(Windows NT 6.0)|(Windows Vista)',
			'Windows 7' => '(Windows NT 6.1)|(Windows 7)',
			'Windows 8' => '(Windows NT 6.2)',
			'Windows 10' => '(Windows NT 10.0)|(Windows 10)',
			'iPhone' => '(iPhone)',
			'Open BSD' => 'OpenBSD',
			'Sun OS' => 'SunOS',
			'Linux' => '(Linux)|(X11)',
			'Safari' => '(Safari)',
			'Mac OS 9' => '(Mac_PowerPC)',
			'Mac OS X' => '(macintosh)|(mac os x)',
			'QNX' => 'QNX',
			'BeOS' => 'BeOS',
			'OS/2' => 'OS/2',
			'Android' => 'android',
			'Search Bot' => '(nuhk)|(Googlebot)|(Yammybot)|(Openbot)|(Slurp/cat)|(msnbot)|(ia_archiver)'
		);

		foreach($os_array as $os => $pattern){
			if(eregi($pattern,$userAgent)){
				return $os;
			}
		}
		return 'Unknown';
	}

	$sistem_operasi = operating_system($_SERVER['HTTP_USER_AGENT']);
?>
