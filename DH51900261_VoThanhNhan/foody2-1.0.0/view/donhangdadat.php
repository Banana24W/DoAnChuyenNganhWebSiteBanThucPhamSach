<?php 
if(!isset($_SESSION['id_khachhang']) && !isset($_SESSION['cart'])){
	header('Location:../index.php');
} 
?>
<p>Chi tiết đơn hàng đã đặt</p>
<div class="container">
	<?php
  if(isset($_SESSION['id_khachhang'])){
  ?>
  <!-- Responsive Arrow Progress Bar -->
  <div class="arrow-steps clearfix">
  <div class="step done"> <span> <a href="./giohang.php" >Giỏ hàng</a></span> </div>
    <div class="step done"> <span><a href="./vanchuyen.php" >Vận chuyển</a></span> </div>
    <div class="step current"> <span><a href="./thongtinthanhtoan.php" >Thanh toán</a><span> </div>
    <div class="step"> <span><a href="./donhangdadat.php" >Lịch sử đơn hàng</a><span> </div>
  </div>
 	<?php
 	} 
 	?>
</div>
