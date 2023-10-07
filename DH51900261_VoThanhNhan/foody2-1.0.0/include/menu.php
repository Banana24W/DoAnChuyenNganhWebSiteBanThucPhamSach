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
                            <a class="dropdown-item" href="./thaydoimatkhau.php">Thay đổi mật khẩu</a>
                            <a class="dropdown-item" href="./lichsudonhang.php">Lịch sử đơn hàng</a>
                        <?php
                        }
                        ?>
                    </div>
                </div>


                <?php
                if (isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1) {
                    unset($_SESSION['dangky']);
                }
                ?>
                <a href="../view/contact.php" class="nav-item nav-link">Đăng Ký</a>
            </div>
            <div class="d-none d-lg-flex ms-2">
                <a class="btn-sm-square bg-white rounded-circle ms-3" href="../controler/timkiem.php">
                    <small class="fa fa-search text-body"></small>
                </a>
                <?php
                if (isset($_SESSION['dangky'])) {
                ?>
                    <a class="btn-sm-square bg-white rounded-circle ms-3" href="../view/info.php">
                        <small class="fa fa-user text-body"></small>
                    </a>
                <?php
                }else{
                    ?>
                         <a class="btn-sm-square bg-white rounded-circle ms-3" href="../view/dangnhap.php">
                        <small class="fa fa-user text-body"></small>
                    </a>
                    <?php
                }
                ?>
                <a class="btn-sm-square bg-white rounded-circle ms-3" href="giohang.php">
                    <small class="fa fa-shopping-bag text-body"></small>
                </a>
            </div>
        </div>
    </nav>
</div>
<!-- Navbar End -->