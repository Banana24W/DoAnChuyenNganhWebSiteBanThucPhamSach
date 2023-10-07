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


    <?php
    include '../include/menu.php';
    ?>
    </div>


    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <h1 class="display-3 mb-3 animated slideInDown">Giỏ Hàng</h1>
           
        </div>
    </div>
    <!-- Page Header End -->

    <p style="text-align: center; font-size: 35px;">GIỎ HÀNG CỦA BẠN
     <br>
        <?php
        if (isset($_SESSION['dangky'])) {
            echo 'xin chào: ' . '<span style="color:red">' . $_SESSION['dangky'] . '</span>';
        }
        ?>
    </p>
    <?php
    if (isset($_SESSION['cart'])) {
    }
    ?>
    <?php
    if (isset($_SESSION['id_khachhang'])) {
    ?>
        <div class="container">
            <!-- Responsive Arrow Progress Bar -->
            <div class="arrow-steps clearfix">
                <div class="step current"> <span> <a href="./giohang.php">Giỏ hàng</a></span> </div>
                <div class="step "> <span><a href="./vanchuyen.php">Vận chuyển</a></span> </div>
                <div class="step "> <span><a href="./thongtinthanhtoan.php">Thanh toán</a><span> </div>
                <div class="step"> <span><a href="./donhangdadat.php">Lịch sử đơn hàng</a><span> </div>
            </div>

        </div>
    <?php
    }
    ?>
    <table style="width:100%;text-align: center;border-collapse: collapse;" border="1">
        <tr>
            <th>Số Thứ Tự</th>
            <th>Tên sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Số lượng</th>
            <th>Giá sản phẩm</th>

            <th>Thành tiền</th>

            <th>Quản lý</th>

        </tr>
        <?php
        // session_start();
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
                        <a href="../controler/themgiohang.php?cong=<?php echo $cart_item['id'] ?>"><i class="fa fa-plus"></i></a>
                        <?php echo $cart_item['soluong']; ?>
                        <a href="../controler/themgiohang.php?tru=<?php echo $cart_item['id'] ?>"><i class="fa fa-minus " aria-hidden="true"></i></a>

                    </td>
                    <td><?php echo number_format($cart_item['price'], 0, ',', '.') . 'vnđ'; ?></td>

                    <td><?php echo number_format($thanhtien, 0, ',', '.') . 'vnđ' ?></td>
                    <td><a class="nut" href="../controler/themgiohang.php?xoa=<?php echo $cart_item['id'] ?>">Xóa</a></td>
                </tr>
            <?php
            }
            ?>
            <tr>
                <td colspan="8">
                    <p style="float: left;">Tổng tiền: <?php echo number_format($tongtien, 0, ',', '.') . 'vnđ' ?></p><br />

                    <p style="float: right;"><a class="nut2" href="../controler/themgiohang.php?xoatatca=1">Xóa tất cả</a></p>
                    <div style="clear: both;"></div>
                    <?php
                    if (isset($_SESSION['dangky'])) {
                    ?>
                        <p><a href="./vanchuyen.php">Hình thức vận chuyển</a></p>
                    <?php
                    } else {
                    ?>
                        <p><a href="./contact.php">Đăng kí đặt hàng</a></p>
                    <?php
                    }
                    ?>




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
    <style>
        .nut {
            margin-top: 10px;
            display: inline-block;
            height: 30px;
            width: 100px;
            box-sizing: border-box;
            border: transparent;
            border-radius: 50px;
            font-size: 14px;
            font-weight: 400;
            text-transform: uppercase;
            letter-spacing: 0.2em;
            color: #ffffff;
            background-color: #9cebd5;


        }

        .nut2 {
            margin-top: 10px;
            display: inline-block;
            height: 30px;
            width: 150px;
            box-sizing: border-box;
            border: transparent;
            border-radius: 50px;
            font-size: 14px;
            font-weight: 400;
            text-transform: uppercase;
            letter-spacing: 0.2em;
            color: #ffffff;
            background-color: #9cebd5;


        }
    </style>
</body>

</html>