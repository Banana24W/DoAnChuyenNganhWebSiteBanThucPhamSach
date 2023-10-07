<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Foody - Organic Food Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

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


</head>

<body>


    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->

    <!-- Navbar Start -->
    <div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="top-bar row gx-0 align-items-center d-none d-lg-flex">
            <div class="col-lg-6 px-5 text-start">
                <small><i class="fa fa-map-marker-alt me-2"></i>180 Cao Lỗ, Phường 4, Quận 8 ,TP HCM</small>
                <small class="ms-4"><i class="fa fa-envelope me-2"></i>TNFRESHFOOD@gmail.com</small>
            </div>
            <div class="col-lg-6 px-5 text-end">
                <small>Follow us:</small>
                <a class="text-body ms-3" href=""><i class="fab fa-facebook-f"></i></a>
                <a class="text-body ms-3" href=""><i class="fab fa-twitter"></i></a>
                <a class="text-body ms-3" href=""><i class="fab fa-linkedin-in"></i></a>
                <a class="text-body ms-3" href=""><i class="fab fa-instagram"></i></a>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
            <a href="index.php" class="navbar-brand ms-4 ms-lg-0">
                <h1 class="fw-bold text-primary m-0">TN<span class="text-secondary">FRESH</span>FOOD</h1>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <?php
            session_start();
            ob_start();
            ?>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="../index.php" class="nav-item nav-link">Trang Chủ</a>
                    <a href="../view/about.php" class="nav-item nav-link">Về Chúng Tôi</a>
                    <a href="../view/product.php" class="nav-item nav-link active">Sản Phẩm</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu m-0">
                            <a href="../view/blog.php" class="dropdown-item">Blog Grid</a>

                            <?php
                            if (isset($_SESSION['dangky'])) {

                            ?>
                                <a class="dropdown-item" href="../index.php?dangxuat=1">Đăng xuất</a>
                                <a class="dropdown-item" href="../view/thaydoimatkhau.php">Thay đổi mật khẩu</a>
                                <a class="dropdown-item" href="../view/lichsudonhang.php">Lịch sử đơn hàng</a>
                            <?php
                            } else {
                            ?>
                                <a class="dropdown-item" href="../view/contact.php">Đăng ký</a>
                            <?php
                            }
                            ?>
                            <?php
                            if (isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1) {
                                unset($_SESSION['dangky']);
                            }
                            ?>
                        </div>
                    </div>


                    <a href="../view/contact.php" class="nav-item nav-link">Đăng Ký</a>
                </div>
                <div class="d-none d-lg-flex ms-2">
                    <a class="btn-sm-square bg-white rounded-circle ms-3" href="./timkiem.php">
                        <small class="fa fa-search text-body"></small>
                    </a>
                    <a class="btn-sm-square bg-white rounded-circle ms-3" href="../view/dangnhap.php">
                        <small class="fa fa-user text-body"></small>
                    </a>
                    <a class="btn-sm-square bg-white rounded-circle ms-3" href="../view/giohang.php">
                        <small class="fa fa-shopping-bag text-body"></small>
                    </a>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    </div>


    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <h1 class="display-3 mb-3 animated slideInDown">Tìm Kiếm Sản Phẩm</h1>

        </div>
    </div>
    <form class="" action="" method="POST">
        <div class="search">
            <input type="text" name="tukhoa" id="" placeholder="Nhập tên Sản Phẩm Bạn cần Tìm" class="search__input">
            <button type="submit" class="search__button" name="timkiem" tabIndex="-1">Search</button>
        </div>
    </form>
    <div class="tab-content">
    <div id="tab-1" class="tab-pane fade show p-0 active">
        <div class="row g-4">
            <?php
            include('../Util/config.php');
            ?>
            <?php
            if (isset($_POST['timkiem'])) {
                $tukhoa = $_POST['tukhoa'];
                $sql_pro = "SELECT * FROM product WHERE  product.name LIKE '%" . $tukhoa . "%'";
                
            }
           else{

                $sql_pro = "SELECT * FROM product ";
           }
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
                                        <span class="text-primary me-1"></span><span style="color:red" class="price-sale"><?php echo $row['price'] * $row['discount'] . 'vnd' ?></span></p>
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
                                    <span class="text-primary me-1"></span><span style="color:red" class="price-sale"><?php echo $row['price'] * $row['discount'] . 'vnd' ?></span></p>
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
                                <a class="text-body" href="../view/chitietsp.php?id=<?php echo $row['id'] ?>"><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                            </small>

                            <small class="w-50 text-center py-2">
                                <form method="POST" action="./themgiohang.php?idsanpham=<?php echo $row['id'] ?>">
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


        </div>
    </div>

</div>
    <style>
        .search {
            margin-left: 450px;
            margin-bottom: 50px;
            position: relative;
            display: flex;
            flex-wrap: wrap;
            max-width: 620px;
            width: 100%;
            border: 1px solid #ddd;
            overflow: hidden;
            transition: 0.3s;
            height: 60px;
        }

        .search>* {
            border: none;
            outline: none;
        }

        .search__input {
            padding: 0 15px;
            height: 100%;
            width: calc(100% - 120px);
            font-size: 18px;
            box-sizing: border-box;
        }

        .search__input:not(:placeholder-shown)+.search__button {
            transform: translateY(0px);
        }

        .search__input:placeholder-shown+.search__button {
            transform: translateY(60px);
        }

        .search__button {
            background: #333;
            color: #feffd4;
            font-size: 15px;
            cursor: pointer;
            width: 100px;
            height: calc(100% - 20px);
            transition: 0.3s;
            position: absolute;
            right: 10px;
            top: 10px;
        }

        .search:focus-within {
            transform: translateY(-4px);
            border-color: #bbb;
            box-shadow: 4px 4px 0 #ddd, 8px 8px 0 #fcff88;
        }
    </style>






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