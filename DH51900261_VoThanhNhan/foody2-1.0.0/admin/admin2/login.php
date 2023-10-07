<?php

// Kết nối CSDL
$conn = mysqli_connect('localhost', 'root', '', 'qlch') or die('Không thể kết nối tới database');
mysqli_set_charset($conn, 'UTF8');

// Khởi tạo SESSION
session_start();
if (isset($_SESSION['username'])) {
    unset($_SESSION['username']);
}

// Dùng Isset kẻm tra
if (isset($_POST['login'])) {

    $username = addslashes($_POST['username']);
    $password = addslashes($_POST['password']);
    
    if (!$username || !$password) {
        echo "Nhập đầy đủ thông tin <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }

    // mã hóa pasword
    $password = md5($password);
    $password = strip_tags($password);
    $password = addslashes($password);
    //Kiểm tra tên đăng nhập có tồn tại không
    $query = "SELECT username, password FROM admin WHERE username='$username'";

    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    $row = mysqli_fetch_array($result);

    //So sánh 2 mật khẩu có trùng khớp hay không
    if ($password != $row['password']) {
        echo "Mật khẩu không đúng. Vui lòng nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }

    //Lưu tên đăng nhập
    $_SESSION['username'] = $username;
    $_SESSION["login11"] = true;
    // echo "Xin chào <b>" . $username . "</b>. Bạn đã đăng nhập thành công. <a href='index.html'>Thoát</a>";
    header("Location: index.php");
    die();
    $connect->close();
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <!-- <form action='<?php ($_SERVER['PHP_SELF']) ?>' class="dangnhap" method='POST'>
        Tên đăng nhập : <input type='text' name='username' />
        Mật khẩu : <input type='password' name='password' />
        <input type='submit' class="button" name="login" value='Đăng nhập' />
        <form> -->
        <section>
        <!--Bắt Đầu Phần Hình Ảnh-->
        <div class="img-bg">
            <img src="https://niemvuilaptrinh.ams3.cdn.digitaloceanspaces.com/tao_trang_dang_nhap/hinh_anh_minh_hoa.jpg" alt="Hình Ảnh Minh Họa">
        </div>
        <!--Kết Thúc Phần Hình Ảnh-->
        <!--Bắt Đầu Phần Nội Dung-->
        <div class="noi-dung">
           
            
            <div class="form">
                <h2>Trang Đăng Nhập</h2>
                <form action='<?php ($_SERVER['PHP_SELF']) ?>' class="dangnhap" method='POST'>
                    <div class="input-form">
                        <span>Tên Người Dùng</span>
                        <input type="text" name="username">
                    </div>
                    <div class="input-form">
                        <span>Mật Khẩu</span>
                        <input type="password" name="password">
                    </div>
            
                    <div class="input-form">
                        <input type="submit" class="button" name="login" value='Đăng nhập'>
                    </div>
                   
                </form>
                
            </div>
        </div>
        <!--Kết Thúc Phần Nội Dung-->
    </section>
    <style>
 * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;
        }

        section {
            position: relative;
            width: 100%;
            height: 100vh;
            display: flex;
        }

        section .img-bg {
            position: relative;
            width: 50%;
            height: 100%;
        }

        section .img-bg img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        section .noi-dung {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 50%;
            height: 100%;
        }

        section .noi-dung .form {
            width: 50%;
        }

        section .noi-dung .form h2 {
            color: #607d8b;
            font-weight: 500;
            font-size: 1.5em;
            text-transform: uppercase;
            margin-bottom: 20px;
            border-bottom: 4px solid #ff4584;
            display: inline-block;
            letter-spacing: 1px;
        }

        section .noi-dung .form .input-form {
            margin-bottom: 20px;
        }

        section .noi-dung .form .input-form span {
            font-size: 16px;
            margin-bottom: 5px;
            display: inline-block;
            color: #607db8;
            letter-spacing: 1px;
        }

        section .noi-dung .form .input-form input {
            width: 100%;
            padding: 10px 20px;
            outline: none;
            border: 1px solid #607d8b;
            font-size: 16px;
            letter-spacing: 1px;
            color: #607d8b;
            background: transparent;
            border-radius: 30px;
        }

        section .noi-dung .form .input-form input[type="submit"] {
            background: #ff4584;
            color: #fff;
            outline: none;
            border: none;
            font-weight: 500;
            cursor: pointer;
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.12),
                0 2px 2px rgba(0, 0, 0, 0.12),
                0 4px 4px rgba(0, 0, 0, 0.12),
                0 8px 8px rgba(0, 0, 0, 0.12),
                0 16px 16px rgba(0, 0, 0, 0.12);
        }

        section .noi-dung .form .input-form input[type="submit"]:hover {
            background: #f53677;
        }

        section .noi-dung .form .nho-dang-nhap {
            margin-bottom: 10px;
            color: #607d8b;
            font-size: 14px;
        }

        section .noi-dung .form .input-form p {
            color: #607d8b;
        }

        section .noi-dung .form .input-form p a {
            color: #ff4584;
        }

        section .noi-dung .form h3 {
            color: #607d8b;
            text-align: center;
            margin: 80px 0 10px;
            font-weight: 500;
        }

        section .noi-dung .form .icon-dang-nhap {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        section .noi-dung .form .icon-dang-nhap li {
            list-style: none;
            cursor: pointer;
            width: 50px;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        section .noi-dung .form .icon-dang-nhap li:nth-child(1) {
            color: #3b5999;
        }

        section .noi-dung .form .icon-dang-nhap li:nth-child(2) {
            color: #dd4b39;
        }

        section .noi-dung .form .icon-dang-nhap li:nth-child(3) {
            color: #55acee;
        }

        section .noi-dung .form .icon-dang-nhap li i {
            font-size: 24px;
        }

        @media (max-width: 768px) {
            section .img-bg {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
            }

            section .noi-dung {
                display: flex;
                justify-content: center;
                align-items: center;
                width: 100%;
                height: 100%;
                z-index: 1;
            }

            section .noi-dung .form {
                width: 100%;
                padding: 40px;
                background: rgba(255 255 255 / 0.9);
                margin: 50px;
            }

            section .noi-dung .form h3 {
                color: #607d8b;
                text-align: center;
                margin: 30px 0 10px;
                font-weight: 500;
            }
        }
    </style>

</body>

</html>