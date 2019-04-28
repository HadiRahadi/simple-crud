<?php
	// set connection
	$server = "localhost";
	$user	= "root";
	$pass	= "";
	$dbname = "perusahaan";

	// create connection
	$con = mysqli_connect($server, $user, $pass, $dbname);

	// chceking connection
	if (mysqli_connect_errno()) {
		die("Connection Failed : ". mysqli_error());
	} else {
		// 
	}

	function testcase($str)
	{
		$txt = trim(stripslashes(htmlspecialchars($str)));
		return $txt;
	}
?>