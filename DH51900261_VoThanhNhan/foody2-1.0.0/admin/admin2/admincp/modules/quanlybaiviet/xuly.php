<?php
$conn = new mysqli("localhost", "root", "", "qlch");

// Check connection
if ($conn->connect_errno) {
	echo "Kết nối MYSQLi lỗi" . $mysqli->connect_error;
	exit();
}
$conn->set_charset("utf8");

$tenbaiviet = $_POST['tenbaiviet'];
//xuly hinh anh

$hinhanh = $_FILES['hinhanh']['name'];
$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
$hinhanh = time().'_'.$hinhanh;


$tomtat = $_POST['tomtat'];
$noidung = $_POST['noidung'];
$tinhtrang = $_POST['tinhtrang'];



if(isset($_POST['thembaiviet'])){
	//them
	$sql_them = "INSERT INTO tbl_baiviet(tenbaiviet,hinhanh,tomtat,noidung,tinhtrang) VALUE('".$tenbaiviet."','".$hinhanh."','".$tomtat."','".$noidung."','".$tinhtrang."')";
	mysqli_query($conn,$sql_them);
	move_uploaded_file($hinhanh_tmp,'../quanlybaiviet/uploads/'.$hinhanh);
	header('Location: ../../index.php?action=quanlybaiviet&query=them');
}
elseif(isset($_POST['suabaiviet'])){
	//sua
	if(!empty($_FILES['hinhanh']['name'])){

		move_uploaded_file($hinhanh_tmp,'../quanlybaiviet/uploads/'.$hinhanh);
		
		$sql_update = "UPDATE tbl_baiviet SET tenbaiviet='".$tenbaiviet."',hinhanh='".$hinhanh."',tomtat='".$tomtat."',noidung='".$noidung."',tinhtrang='".$tinhtrang."' WHERE id='$_GET[idbaiviet]'";

		//xoa hinh anh cu
		$sql = "SELECT * FROM tbl_baiviet WHERE id = '$_GET[idbaiviet]' LIMIT 1";
		$query = mysqli_query($conn,$sql);
		while($row = mysqli_fetch_array($query)){
			unlink('../quanlybaiviet/uploads/'.$row['hinhanh']);
		}
		
	}else{
		$sql_update = "UPDATE tbl_baiviet SET tenbaiviet='".$tenbaiviet."',tomtat='".$tomtat."',noidung='".$noidung."',tinhtrang='".$tinhtrang."' WHERE id='$_GET[idbaiviet]'";
		
	}

	mysqli_query($conn,$sql_update);
	header('Location:../../index.php?action=quanlybaiviet&query=them');

}else{
	$id=$_GET['idbaiviet'];
	$sql = "SELECT * FROM tbl_baiviet WHERE id = '$id' LIMIT 1";
	$query = mysqli_query($conn,$sql);
	while($row = mysqli_fetch_array($query)){
		unlink('uploads/'.$row['hinhanh']);
	}
	$sql_xoa = "DELETE FROM tbl_baiviet WHERE id='".$id."'";
	mysqli_query($conn,$sql_xoa);
	header('Location:../../index.php?action=quanlybaiviet&query=them');
}

?>