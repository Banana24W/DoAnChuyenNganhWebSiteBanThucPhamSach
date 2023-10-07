<html lang="en">

<head>
  <title>Harvest vase</title>
  <link href="https://fonts.googleapis.com/css?family=Bentham|Playfair+Display|Raleway:400,500|Suranna|Trocchi" rel="stylesheet">
  <style>
    /* 
* Design by Robert Mayer:https://goo.gl/CJ7yC8
*
*I intentionally left out the line that was supposed to be below the subheader simply because I don't like how it looks.
*
* Chronicle Display Roman font was substituted for similar fonts from Google Fonts.
*/

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

    .product-price-btn button {

      display: inline-block;
      height: 50px;
      width: 176px;
      margin-left: 250px;
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

    .product-price-btn button:hover {
      background-color: #79b0a1;
    }
  </style>
</head>

<body>
  <?php
  include('../Util/config.php');
  ?>
  <?php



  $sql_chitiet = "SELECT * FROM product WHERE product.id='7'LIMIT 1";
  $query_chitiet = mysqli_query($conn, $sql_chitiet);
  while ($row_chitiet = mysqli_fetch_array($query_chitiet)) {
  ?>
    <div class="wrapper">
      <div class="product-img">
        <img src="admin/admin2/uploads/<?php echo $row_chitiet['image'] ?>" height="420" width="327">
      </div>
      <div class="product-info">
        <div class="product-text">
          <h1>Tên: <?php echo $row_chitiet['name'] ?></h1>
          <h1>Số Sản Phẩm còn lại: <?php echo $row_chitiet['soluong'] ?></h1>
          <h2>Mô tả</h2>
          <p><?php echo $row_chitiet['description'] ?></p>
        </div>
        <div class="product-price-btn">
          <p><span><?php echo number_format($row_chitiet['price'], 0, ',', '.') . '  vnđ/kg' ?></span></p>
          <button type="button">buy now</button>
        </div>
      </div>
    </div>

  <?php
  }
  ?>
</body>

</html>