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
            <h1 class="display-3 mb-3 animated slideInDown">Products</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a class="text-body" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-body" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-dark active" aria-current="page">Products</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Product Start -->
    <!-- Product Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-0 gx-5 align-items-end">
                <div class="col-lg-6">
                    <div class="section-header text-start mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                        <h1 class="display-5 mb-3">Sản Phẩm Của Chúng Tôi</h1>
                        
                    </div>
                </div>
                <div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                    <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                        <li class="nav-item me-2">
                            <a class="btn btn-outline-primary border-2 active" data-bs-toggle="pill" href="#tab-1">Trái Cây</a>
                        </li>
                        <li class="nav-item me-2">
                            <a class="btn btn-outline-primary border-2" data-bs-toggle="pill" href="#tab-2">Thịt,Cá</a>
                        </li>
                        <li class="nav-item me-0">
                            <a class="btn btn-outline-primary border-2" data-bs-toggle="pill" href="#tab-3">Thực Phẩm Chế Biến Sẳn</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                    <?php
    include('../Util/config.php');
    ?>
                        <?php
                        $sql_pro = "SELECT * FROM product";
                        $query_pro = mysqli_query($conn, $sql_pro);
                        while ($row = mysqli_fetch_array($query_pro)) {
                        ?>

                            <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="product-item">
                                    <div class="position-relative bg-light overflow-hidden">

                                        <img class="img-fluid w-100" src="../admin/admin2/uploads/<?php echo $row['image'] ?>">
                                        <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                                    </div>
                                    <div class="text-center p-4">
                                        <a class="d-block h5 mb-2" href=""><?php echo $row['name'] ?></a>
                                        <?php
                                        if ($row['discount'] > 0) { ?>
                                            <div style="display:flex;">
                                                <?php
                                                if ($row['discount'] > 0) {
                                                ?>
                                                    <span class="text-primary me-1"></span><span style="color:red" class="price-sale"><?php echo ($row['price']- (($row['price'] * $row['discount']))) . 'vnd' ?></span></p>
                                                <?php
                                                } else {
                                                ?>
                                                    <span class="text-primary me-1"></span><span style="color:red" class="price-sale"><?php echo number_format($row['price'], 0, ',', '.') . 'vnđ' ?></span></p>
                                                <?php
                                                }
                                                ?>
                                                <?php
                                                if ($row['discount'] > 0) {
                                                ?>
                                                    <span style="margin-left: 80px;" class="text-body text-decoration-line-through"><?php echo number_format($row['price'], 0, ',', '.') . 'vnđ' ?> </span>
                                                <?php
                                                }
                                                ?>

                                            </div>
                                        <?php
                                        } else {
                                        ?>
                                            <?php
                                            if ($row['discount'] > 0) {
                                            ?>
                                                <span class="text-primary me-1"></span><span style="color:red" class="price-sale"><?php echo ($row['price']- (($row['price'] * $row['discount']))) . 'vnd' ?></span></p>
                                            <?php
                                            } else {
                                            ?>
                                                <span class="text-primary me-1"></span><span style="color:red" class="price-sale"><?php echo number_format($row['price'], 0, ',', '.') . 'vnđ' ?></span></p>
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            if ($row['discount'] > 0) {
                                            ?>
                                                <span class="text-body text-decoration-line-through"><?php echo number_format($row['price'], 0, ',', '.') . 'vnđ' ?> </span>
                                            <?php
                                            }
                                            ?>

                                        <?php
                                        }
                                        ?>

                                    </div>
                                    <div class="d-flex border-top">
                                        <small class="w-50 text-center border-end py-2">
                                            <a class="text-body" href="./chitietsp.php?id=<?php echo $row['id'] ?>"><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                                        </small>

                                        <small class="w-50 text-center py-2">
                                            <form method="POST" action="../controler/themgiohang.php?idsanpham=<?php echo $row['id'] ?>">
                                                <div class="chitiet_sanpham">
                                        
                                                    <p><input class="themgiohang" name="themgiohang" type="submit" value="Thêm giỏ hàng"></p>

                                                </div>
                                            </form>
                                        </small>

                                    </div>
                                </div>
                            </div>

                        <?php
                        }
                        ?>
                   
                   
                    <div class="col-12 text-center">
                        <a class="btn btn-primary rounded-pill py-3 px-5" href="">Browse More Products</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Product End -->


    <!-- Firm Visit Start -->
    <div class="container-fluid bg-primary bg-icon mt-5 py-6">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-md-7 wow fadeIn" data-wow-delay="0.1s">
                    <h1 class="display-5 text-white mb-3">Visit Our Firm</h1>
                    <p class="text-white mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos.</p>
                </div>
                <div class="col-md-5 text-md-end wow fadeIn" data-wow-delay="0.5s">
                    <a class="btn btn-lg btn-secondary rounded-pill py-3 px-5" href="">Visit Now</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Firm Visit End -->


     <!-- Testimonial Start -->
     <div class="container-fluid bg-light bg-icon py-6 mb-5">
        <div class="container">
            <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-5 mb-3">Đánh Giá Của Khách Hàng</h1>
               
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                <div class="testimonial-item position-relative bg-white p-5 mt-4">
                    <i class="fa fa-quote-left fa-3x text-primary position-absolute top-0 start-0 mt-n4 ms-5"></i>
                    <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                    <div class="d-flex align-items-center">
                        <img class="flex-shrink-0 rounded-circle" src="../img/testimonial-1.jpg" alt="">
                        <div class="ms-3">
                            <h5 class="mb-1">Võ Thanh Nhân</h5>
                            <span>Sinh Viên</span>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item position-relative bg-white p-5 mt-4">
                    <i class="fa fa-quote-left fa-3x text-primary position-absolute top-0 start-0 mt-n4 ms-5"></i>
                    <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                    <div class="d-flex align-items-center">
                        <img class="flex-shrink-0 rounded-circle" src="../img/testimonial-2.jpg" alt="">
                        <div class="ms-3">
                            <h5 class="mb-1">Nguyễn Thanh Nhân</h5>
                            <span>Sinh Viên</span>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item position-relative bg-white p-5 mt-4">
                    <i class="fa fa-quote-left fa-3x text-primary position-absolute top-0 start-0 mt-n4 ms-5"></i>
                    <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                    <div class="d-flex align-items-center">
                        <img class="flex-shrink-0 rounded-circle" src="../img/testimonial-3.jpg" alt="">
                        <div class="ms-3">
                            <h5 class="mb-1">Nguyễn Ngọc Lâm</h5>
                            <span>Giảng Viên</span>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item position-relative bg-white p-5 mt-4">
                    <i class="fa fa-quote-left fa-3x text-primary position-absolute top-0 start-0 mt-n4 ms-5"></i>
                    <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                    <div class="d-flex align-items-center">
                        <img class="flex-shrink-0 rounded-circle" src="../img/testimonial-4.jpg" alt="">
                        <div class="ms-3">
                            <h5 class="mb-1">Trần Văn Hùng</h5>
                            <span>Giảng Viên</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->



 
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