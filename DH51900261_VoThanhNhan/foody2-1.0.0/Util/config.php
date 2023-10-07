<?php

$conn = new mysqli("localhost", "root", "", "qlch");

// Check connection
if ($conn->connect_errno) {
	echo "Kết nối MYSQLi lỗi" . $mysqli->connect_error;
	exit();
}
$conn->set_charset("utf8");



?>
