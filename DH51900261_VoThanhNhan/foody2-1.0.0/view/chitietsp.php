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
      <h1 class="display-3 mb-3 animated slideInDown">Chi Tiết Sản Phẩm</h1>
      
    </div>
  </div>
  <!-- Page Header End -->
  <style>
    body {
      background-color: #fdf1ec;
    }

    .wrapper {
      height: 520px;
      width: 804px;
      margin: 50px auto;
      border-radius: 7px 7px 7px 7px;
      /* VIA CSS MATIC https://goo.gl/cIbnS */
      -webkit-box-shadow: 0px 14px 32px 0px rgba(0, 0, 0, 0.15);
      -moz-box-shadow: 0px 14px 32px 0px rgba(0, 0, 0, 0.15);
      box-shadow: 0px 14px 32px 0px rgba(0, 0, 0, 0.15);
    }

    .product-img {
      float: left;
      height: 420px;
      width: 327px;
    }

    .product-img img {
      border-radius: 7px 0 0 7px;
    }

    .product-info {
      float: left;
      height: 490px;
      width: 457px;
      border-radius: 0 7px 10px 7px;
      background-color: #ffffff;
    }

    .product-text {
      height: 350px;
      width: 40 7px;
    }

    .product-text h1 {
      margin: 0 0 0 38px;
      padding-top: 0px;
      font-size: 34px;
      color: #474747;
    }

    .product-text h1,
    .product-price-btn p {
      font-family: 'Bentham', serif;
    }

    .product-text h2 {
      padding-top: 40px;
      margin: 0 0 0px 38px;
      font-size: 13px;
      font-family: 'Bentham', serif;

      text-transform: uppercase;

      letter-spacing: 0.2em;
    }

    .product-text p {
      height: 225px;
      margin: 0 0 0 38px;
      font-family: 'Playfair Display', serif;
      color: #8d8d8d;
      line-height: 1.7em;
      font-size: 15px;
      font-weight: lighter;
      overflow: hidden;
    }

    .product-price-btn {
      height: 103px;
      width: 327px;
      margin-top: 17px;
      position: relative;
    }

    .product-price-btn p {
      display: inline-block;
      position: absolute;
      top: -13px;
      height: 50px;
      font-family: 'Trocchi', serif;
      margin: 0 0 0 38px;
      font-size: 28px;
      font-weight: lighter;
      color: #474747;
    }

    span {
      display: inline-block;
      height: 50px;
      font-family: 'Suranna', serif;
      font-size: 34px;
    }

    .product-price-btn input {

      display: inline-block;
      height: 50px;
      width: 176px;
      margin-left: 200px;
      box-sizing: border-box;
      border: transparent;
      border-radius: 60px;
      font-family: 'Raleway', sans-serif;
      font-size: 14px;
      font-weight: 500;
      text-transform: uppercase;
      letter-spacing: 0.2em;
      color: #ffffff;
      background-color: #9cebd5;
      cursor: pointer;
      outline: none;
    }

    .product-price-btn input:hover {
      background-color: #79b0a1;
    }
  </style>
  </head>

  <body>
    <?php
    include('../Util/config.php');
    ?>
    <?php
    $sql_chitiet = "SELECT * FROM product WHERE product.id='$_GET[id]'LIMIT 1";
    $query_chitiet = mysqli_query($conn, $sql_chitiet);
    while ($row_chitiet = mysqli_fetch_array($query_chitiet)) {
    ?>
      <div class="wrapper">
        <div class="product-img">
          <img src="../admin/admin2/uploads/<?php echo $row_chitiet['image'] ?>" height="490" width="327">
        </div>
        <div class="product-info">

          <form method="POST" action="../controler/themgiohang.php?idsanpham=<?php echo $row_chitiet['id'] ?>">
            <div class="chitiet_sanpham">
              <div class="product-text">
                <h1> <?php echo $row_chitiet['name'] ?></h1>
                <h1> <?php if ($row_chitiet['soluong'] == 0) {
                        echo 'Hết Hàng';
                      } else { ?>
                    Số Sản Phẩm Còn Lại: <?php echo $row_chitiet['soluong'] ?> <?php } ?>
                </h1>
                <h2>Mô tả</h2>
                <p><?php echo $row_chitiet['description'] ?></p>
              </div>
              <div class="product-price-btn">
                <p><span><?php echo number_format($row_chitiet['price'], 0, ',', '.') . '  vnđ/kg' ?></span></p>
                <!-- <button class="themgiohang" name="themgiohang" type="button">buy now</button>  -->
                <p><input class="themgiohang" name="themgiohang" type="submit" value="Thêm giỏ hàng"></p>
              </div>

            </div>
          </form>

        </div>
      </div>

    <?php
    }
    ?>


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