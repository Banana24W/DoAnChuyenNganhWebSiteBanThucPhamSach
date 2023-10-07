<?php
session_start();
ob_start();
	include('../Util/config.php');
	require('../model/mail/sendmail.php');
	$id_khachhang = $_SESSION['id_khachhang'];
	$email=$_SESSION['email'];
	$code_order = rand(0,9999);
	$insert_cart = "INSERT INTO tbl_cart(id_khachhang,code_cart,cart_status) VALUE('".$id_khachhang."','".$code_order."',1)";
	$cart_query = mysqli_query($conn,$insert_cart);
if ($cart_query) {

	// 	//them gio hang chi tiet
	foreach ($_SESSION['cart'] as $key => $value) {
		$id_sanpham = $value['id'];
		$soluong = $value['soluong'];
		$insert_order_details = "INSERT INTO tbl_cart_details(id_sanpham,code_cart,soluongmua) VALUE('" . $id_sanpham . "','" . $code_order . "','" . $soluong . "')";
		mysqli_query($conn, $insert_order_details);
	}
	$tieude = "Đặt hàng website banhangcongnghe.net thành công!";
	$noidung = "<p>Cảm ơn quý khách đã đặt hàng của chúng tôi với mã đơn hàng :</p>";
	// $noidung.="<h4>Đơn hàng đặt bao gồm :</h4p>";

	foreach ($_SESSION['cart'] as $key => $val) {
		$noidung .= "<ul style='border:1px solid blue;margin:10px;'>
				<li>" . $val['name'] . "</li>
				<li>" . number_format($val['price'], 0, ',', '.') . "đ</li>
				<li>" . $val['soluong'] . "</li>
				</ul>";
	}

	$maildathang = $email;
	
		$mail = new Mailer();
		$mail->dathangmail($tieude,$noidung,$maildathang);
	 }
var_dump($_SESSION['cart']);

	unset($_SESSION['cart']);
	


?>