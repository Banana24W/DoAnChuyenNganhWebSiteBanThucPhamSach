<?php 

	$mysqli = new mysqli("localhost","root","","qlch","3306");

	// Check connection
	if ($mysqli->connect_errno) {
	  echo "Kết nối MYSQLi lỗi" . $mysqli->connect_error;
	  exit();
	}
	$mysqli -> set_charset("utf8");



?>