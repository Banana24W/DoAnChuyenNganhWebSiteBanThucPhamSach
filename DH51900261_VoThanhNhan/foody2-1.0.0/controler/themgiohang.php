<?php


session_start();
ob_start();
    $tenmaychu='localhost';
	$tentaikhoan='root';
	$pass='';
	$csdl='qlch'; 
	$conn=mysqli_connect($tenmaychu,$tentaikhoan,$pass,$csdl) or die('Ko kết nối được');
	$conn -> set_charset("utf8");
	//them so luong
	if(isset($_GET['cong'])){
		$id=$_GET['cong'];
		foreach($_SESSION['cart'] as $cart_item){
			if($cart_item['id']!=$id){
				$product[]= array('name'=>$cart_item['name'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'price'=>$cart_item['price'],'image'=>$cart_item['image'],);
				$_SESSION['cart'] = $product;
			}else{
				$tangsoluong = $cart_item['soluong'] + 1;
				if($cart_item['soluong']<=9){
					
					$product[]= array('name'=>$cart_item['name'],'id'=>$cart_item['id'],'soluong'=>$tangsoluong,'price'=>$cart_item['price'],'image'=>$cart_item['image']);
				}else{
					$product[]= array('name'=>$cart_item['name'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'price'=>$cart_item['price'],'image'=>$cart_item['image']);
				}
				$_SESSION['cart'] = $product;
			}
			
		}
		header('Location: ../view/giohang.php');
	}
	//tru so luong
	if(isset($_GET['tru'])){
		$id=$_GET['tru'];
		foreach($_SESSION['cart'] as $cart_item){
			if($cart_item['id']!=$id){
				$product[]= array('name'=>$cart_item['name'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'price'=>$cart_item['price'],'image'=>$cart_item['image']);
				$_SESSION['cart'] = $product;
			}else{
				$tangsoluong = $cart_item['soluong'] - 1;
				if($cart_item['soluong']>1){
					
					$product[]= array('name'=>$cart_item['name'],'id'=>$cart_item['id'],'soluong'=>$tangsoluong,'price'=>$cart_item['price'],'image'=>$cart_item['image']);
				}else{
					$product[]= array('name'=>$cart_item['name'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'price'=>$cart_item['price'],'image'=>$cart_item['image']);
				}
				$_SESSION['cart'] = $product;
			}
			
		}
		header('Location: ../view/giohang.php');
	}
	//xoa san pham
	if(isset($_SESSION['cart'])&&isset($_GET['xoa'])){
		$id=$_GET['xoa'];
		foreach($_SESSION['cart'] as $cart_item){

			if($cart_item['id']!=$id){
				$product[]= array('name'=>$cart_item['name'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'price'=>$cart_item['price'],'image'=>$cart_item['image']);
			}

		$_SESSION['cart'] = $product;
		header('Location: ../view/giohang.php');
		}
	}
	//xoa tat ca
	if(isset($_GET['xoatatca'])&&$_GET['xoatatca']==1){
		unset($_SESSION['cart']);
		header('Location: ../view/giohang.php');
	}
	//them sanpham vao gio hang
	if(isset($_POST['themgiohang'])){
		//session_destroy();
		$id=$_GET['idsanpham'];
		$soluong=1;
		$sql ="SELECT * FROM product WHERE id='".$id."' LIMIT 1";
		$query = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($query);
		if($row){
			$new_product=array(array('name'=>$row['name'],'id'=>$id,'soluong'=>$soluong,'price'=>$row['price'],'image'=>$row['image']));
			//kiem tra session gio hang ton tai
			if(isset($_SESSION['cart'])){
				$found = false;
				foreach($_SESSION['cart'] as $cart_item){
					//neu du lieu trung
					if($cart_item['id']==$id){
						$product[]= array('name'=>$cart_item['name'],'id'=>$cart_item['id'],'soluong'=>$soluong+1,'price'=>$cart_item['price'],'image'=>$cart_item['image']);
						$found = true;
					}else{
						//neu du lieu khong trung
						$product[]= array('name'=>$cart_item['name'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'price'=>$cart_item['price'],'image'=>$cart_item['image']);
					}
				}
				if($found == false){
					//lien ket du lieu new_product voi product
					$_SESSION['cart']=array_merge($product,$new_product);
				}else{
					$_SESSION['cart']=$product;
				}
			}else{
				$_SESSION['cart'] = $new_product;
			}

		}
		header('Location: ../view/giohang.php');
		
	}


ob_end_flush();
?>