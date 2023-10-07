<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Foody - Organic Food Website Template</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta content="" name="keywords">
	<meta content="" name="description">

	<!-- Favicon -->
	<link href="./img/favicon.ico" rel="icon">

	<!-- Google Web Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Lora:wght@600;700&display=swap" rel="stylesheet">

	<!-- Icon Font Stylesheet -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

	<!-- Libraries Stylesheet -->
	<link href="../lib/animate/animate.min.css" rel="stylesheet">
	<link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

	<!-- Customized Bootstrap Stylesheet -->
	<link href="../css/bootstrap.min.css" rel="stylesheet">

	<!-- Template Stylesheet -->
	<link href="../css/style.css" rel="stylesheet">

	<link href="../css2/style.css" rel="stylesheet">

</head>

<body>
	<!-- Spinner Start -->
	<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
		<div class="spinner-border text-primary" role="status"></div>
	</div>
	<!-- Spinner End -->


	<!-- Navbar Start -->


	<?php
	include '../include/menu.php';
	?>

	</div>
	<!-- Navbar End -->


	<!-- Page Header Start -->
	<div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
		<div class="container">
			<h1 class="display-3 mb-3 animated slideInDown">Thông Tin Thanh Toán</h1>

		</div>
	</div>
	<!-- Page Header End -->
	<p style="text-align: center;">Hình thức thanh toán</p>
	<div class="container">
		<!-- Responsive Arrow Progress Bar -->
		<?php
		include('../Util/config.php');
		?>
		<?php
		if (isset($_SESSION['id_khachhang'])) {
		?>
			<div class="arrow-steps clearfix">
				<div class="step done"> <span> <a href="./giohang.php">Giỏ hàng</a></span> </div>
				<div class="step done"> <span><a href="./vanchuyen.php">Vận chuyển</a></span> </div>
				<div class="step current"> <span><a href="./thongtinthanhtoan.php">Thanh toán</a><span> </div>
				<div class="step"> <span><a href="./donhangdadat.php">Lịch sử đơn hàng</a><span> </div>
			</div>
		<?php
		}
		?>
		<form action="../controler/xulythanhtoan.php" method="POST">
			<div class="row">

				<?php

				$id_dangky = $_SESSION['id_khachhang'];
				$sql_get_vanchuyen = mysqli_query($conn, "SELECT * FROM tbl_shipping WHERE id_dangki='$id_dangky' LIMIT 1");
				$count = mysqli_num_rows($sql_get_vanchuyen);
				if ($count > 0) {
					$row_get_vanchuyen = mysqli_fetch_array($sql_get_vanchuyen);
					$name = $row_get_vanchuyen['name'];
					$phone = $row_get_vanchuyen['phone'];
					$address = $row_get_vanchuyen['address'];
					$note = $row_get_vanchuyen['note'];
				} else {

					$name = '';
					$phone = '';
					$address = '';
					$note = '';
				}
				?>

				<div class="col-md-8">
					<h4>Thông tin vận chuyển và giỏ hàng</h4>
					<ul>
						<li>Họ và tên vận chuyển : <b><?php echo $name ?></b></li>
						<li>Số điện thoại : <b><?php echo $phone ?></b></li>
						<li>Địa chỉ : <b><?php echo $address ?></b></li>
						<li>Ghi chú : <b><?php echo $note ?></b></li>
					</ul>
					<h5>Giỏ hàng của bạn</h5>
					<table style="width:100%;text-align: center;border-collapse: collapse;" border="1">
						<tr>
							<th>Id</th>
							<th>Tên sản phẩm</th>
							<th>Hình ảnh</th>
							<th>Số lượng</th>
							<th>Giá sản phẩm</th>
							<th>Thành tiền</th>


						</tr>
						<?php
						if (isset($_SESSION['cart'])) {
							$i = 0;
							$tongtien = 0;
							foreach ($_SESSION['cart'] as $cart_item) {
								$thanhtien = $cart_item['soluong'] * $cart_item['price'];
								$tongtien += $thanhtien;
								$i++;
						?>
								<tr>
									<td><?php echo $i; ?></td>

									<td><?php echo $cart_item['name']; ?></td>
									<td><img src="../admin/admin2/uploads/<?php echo $cart_item['image']; ?>" width="150px"></td>
									<td>
										<a href="../controler/themgiohang.php?cong=<?php echo $cart_item['id'] ?>"><i class="fa fa-plus fa-style" aria-hidden="true"></i></a>
										<?php echo $cart_item['soluong']; ?>
										<a href="../controler/themgiohang.php?tru=<?php echo $cart_item['id'] ?>"><i class="fa fa-minus fa-style" aria-hidden="true"></i></a>

									</td>
									<td><?php echo number_format($cart_item['price'], 0, ',', '.') . 'vnđ'; ?></td>
									<td><?php echo number_format($thanhtien, 0, ',', '.') . 'vnđ' ?></td>

								</tr>
							<?php
							}
							?>
							<tr>
								<td colspan="8">
									<p style="float: left;">Tổng tiền: <?php echo number_format($tongtien, 0, ',', '.') . 'vnđ' ?></p><br />

									<div style="clear: both;"></div>





								</td>


							</tr>
						<?php
						} else {
						?>
							<tr>
								<td colspan="8">
									<p>Hiện tại giỏ hàng trống</p>
								</td>

							</tr>
						<?php
						}
						?>

					</table>
				</div>
				<style type="text/css">
					.col-md-4.hinhthucthanhtoan .form-check {
						margin: 11px;
					}
				</style>

				<div class="col-md-4 hinhthucthanhtoan">
					<h4>Phương thức thanh toán</h4>
					<div class="form-check">
						<input class="form-check-input" type="radio" name="payment" id="exampleRadios1" value="tienmat" checked>
						<label class="form-check-label" for="exampleRadios1">
							Tiền mặt
						</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="radio" name="payment" id="exampleRadios2" value="chuyenkhoan">
						<label class="form-check-label" for="exampleRadios2">
							Chuyển khoản
						</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="radio" name="payment" id="exampleRadios4" value="vnpay">
						<img src="../images/vnpay.png" height="20" width="64">
						<label class="form-check-label" for="exampleRadios4">
							Vnpay
						</label>
					</div>
					<input type="submit" value="Thanh toán ngay" name="redirect" class="btn btn-danger">

		</form>

		<p></p>

		<?php
		$tongtien = 0;
		foreach ($_SESSION['cart'] as $key => $value) {
			$thanhtien = $value['soluong'] * $value['price'];
			$tongtien += $thanhtien;
		}
		$tongtien_vnd = $tongtien;
		$tongtien_usd = round($tongtien / 22667);
		?>
		<input type="hidden" name="" value="<?php echo $tongtien_usd ?>" id="tongtien">
		<div id="paypal-button"></div>

		<form class="" method="POST" target="_blank" enctype="application/x-www-form-urlencoded"
                          action="./xulythanhtoanmomo.php">
            <input type="hidden" value="<?php echo $tongtien_vnd ?>" name="tongtien_vnd">              	
			<input type="submit" name="momo" value="Thanh toán MOMO QRcode" class="btn btn-danger">

		</form>

		<p></p>
		
		<form class="" method="POST" target="_blank" enctype="application/x-www-form-urlencoded"
                          action="./xulythanhtoanmomo_atm.php">
		<input type="hidden" value="<?php echo $tongtien_vnd ?>" name="tongtien_vnd">        
		<input type="submit" name="momo" value="Thanh toán MOMO ATM" class="btn btn-danger">

		</form>



	</div>

	</div>




	</div>






    <?php
    include '../include/footer.php';
    ?>


	<!-- Back to Top -->
	<a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


	<!-- JavaScript Libraries -->
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
	<script src="../lib/wow/wow.min.js"></script>
	<script src="../lib/easing/easing.min.js"></script>
	<script src="../lib/waypoints/waypoints.min.js"></script>
	<script src="../lib/owlcarousel/owl.carousel.min.js"></script>

	<!-- Template Javascript -->
	<script src="../js/main.js"></script>
</body>

</html>