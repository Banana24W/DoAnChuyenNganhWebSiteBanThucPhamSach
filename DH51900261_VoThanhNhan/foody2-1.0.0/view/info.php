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
  <div class="container-fluid page-header wow fadeIn" data-wow-delay="0.1s">
    <div class="container">
      <h1 class="display-3 mb-3 animated slideInDown">Thông Tin Khách Hàng</h1>
      <nav aria-label="breadcrumb animated slideInDown">

      </nav>
    </div>
  </div>
  <!-- Page Header End -->

  <!-- Contact Start -->
  <!-- Responsive Contact Page with Dark Mode and Form Validation (vanilla JS).

*Designed & built for desktop and tablets with viewport width >= 720px and in landscape orientation.  -->

  <div class="contact-container">
    <div class="left-col">
      <img class="logo" src="https://www.indonesia.travel/content/dam/indtravelrevamp/en/logo.png" />
    </div>
    <div class="right-col">
      


      <?php
      include('../Util/config.php');
      ?>
      <?php
      
      if (isset($_SESSION['dangky'])) {

        $id = $_SESSION['id_khachhang'];
      }
      $sql_chitiet = "SELECT * FROM user WHERE user.id='$id'LIMIT 1";
      $query_chitiet = mysqli_query($conn, $sql_chitiet);
      while ($row_chitiet = mysqli_fetch_array($query_chitiet)) {
      ?>
        <form id="contact-form" method="post">
          <label for="name">Họ Và Tên</label>
          <input type="text" id="name" name="name" placeholder="<?php echo $row_chitiet['name'] ?>" required readonly="False">

          <label for="email">Email</label>
          <input type="email" id="email" name="email" placeholder="<?php echo $row_chitiet['email'] ?>" required readonly="False">

          <label for="message">Số Điện Thoại</label>
          <input type="email" id="email" name="email" placeholder="<?php echo $row_chitiet['address'] ?>" required readonly="False">

          <label for="message">Địa Chỉ</label>
          <input type="email" id="email" name="email" placeholder="<?php echo $row_chitiet['phone'] ?>" required readonly="False">
          <!--</a>-->
        </form>
      <?php
      }

      ?>

      <div id="error"></div>
      <div id="success-msg"></div>
    </div>
  </div>

  <!-- Image credit: Oliver Sjöström https://www.pexels.com/photo/body-of-water-near-green-mountain-931018/  -->
  <style>
   
    [data-theme="dark"] {
      --primary-color: #FCFDFD;
      --secondary-color: #818386;
      --bg-color: #010712;
      --button-color: #818386;
      --h1-color: #FCFDFD;
    }

    * {
      margin: 0;
      box-sizing: border-box;
      transition: all 0.3s ease-in-out;
    }

    .contact-container {
      display: flex;
      width: 100vw;
      height: 100vh;
      background: var(--bg-color);
    }

    .left-col {
      width: 45vw;
      height: 100%;
      background-image: url("https://images.pexels.com/photos/931018/pexels-photo-931018.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500");
      background-size: cover;
      background-repeat: no-repeat;
    }

    .logo {
      width: 10rem;
      padding: 1.5rem;
    }

    .right-col {
      background: var(--bg-color);
      width: 50vw;
      height: 100vh;
      padding: 5rem 3.5rem;
    }

  


  

    label,
    .description {
      color: var(--secondary-color);
      text-transform: uppercase;
      font-size: 0.625rem;
    }

    form {
      width: 31.25rem;
      position: relative;
      margin-top: 2rem;
      padding: 1rem 0;
    }

    input,
    textarea,
    label {
      width: 40vw;
      display: block;
    }

    
    placeholder,
    input,
    textarea {
      font-family: 'Helvetica Neue', sans-serif;
    }

    input::placeholder,
    textarea::placeholder {
      color: var(--primary-color);
    }

    input,
    textarea {
      color: var(--primary-color);
      font-weight: 500;
      background: var(--bg-color);
      border: none;
      border-bottom: 1px solid var(--secondary-color);
      padding: 0.5rem 0;
      margin-bottom: 1rem;
      outline: none;
    }

    textarea {
      resize: none;
    }

    button {
      text-transform: uppercase;
      font-weight: 300;
      background: var(--button-color);
      color: var(--bg-color);
      width: 10rem;
      height: 2.25rem;
      border: none;
      border-radius: 2px;
      outline: none;
      cursor: pointer;
    }

    input:hover,
    textarea:hover,
    button:hover {
      opacity: 0.5;
    }

    button:active {
      opacity: 0.8;
    }

    /* Toggle Switch */

    .theme-switch-wrapper {
      display: flex;
      align-items: center;
      text-align: center;
      width: 160px;
      position: absolute;
      top: 0.5rem;
      right: 0;
    }

    .description {
      margin-left: 1.25rem;
    }

    .theme-switch {
      display: inline-block;
      height: 34px;
      position: relative;
      width: 60px;
    }

    .theme-switch input {
      display: none;
    }

    .slider {
      background-color: #ccc;
      bottom: 0;
      cursor: pointer;
      left: 0;
      position: absolute;
      right: 0;
      top: 0;
      transition: .4s;
    }

    .slider:before {
      background-color: #fff;
      bottom: 0.25rem;
      content: "";
      width: 26px;
      height: 26px;
      left: 0.25rem;
      position: absolute;
      transition: .4s;
    }

    input:checked+.slider {
      background-color: var(--button-color);
    }

    input:checked+.slider:before {
      transform: translateX(26px);
    }

    .slider.round {
      border-radius: 34px;
    }

    .slider.round:before {
      border-radius: 50%;
    }

    #error,
    #success-msg {
      width: 40vw;
      margin: 0.125rem 0;
      font-size: 0.75rem;
      text-transform: uppercase;
      font-family: 'Jost';
      color: var(--secondary-color);
    }


    #success-msg {
      transition-delay: 3s;
    }

    @media only screen and (max-width: 950px) {
      .logo {
        width: 8rem;
      }

      input,
      textarea,
      button {
        font-size: 0.65rem;
      }

      .description {
        font-size: 0.3rem;
        margin-left: 0.4rem;
      }

      button {
        width: 7rem;
      }

      .theme-switch-wrapper {
        width: 120px;
      }

      .theme-switch {
        height: 28px;
        width: 50px;
      }

      .theme-switch input {
        display: none;
      }

      .slider:before {
        background-color: #fff;
        bottom: 0.25rem;
        content: "";
        width: 20px;
        height: 20px;
        left: 0.25rem;
        position: absolute;
        transition: .4s;
      }

      input:checked+.slider:before {
        transform: translateX(16px);
      }

      .slider.round {
        border-radius: 15px;
      }

      .slider.round:before {
        border-radius: 50%;
      }

    }
  </style>
  




  <!-- Contact End -->





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