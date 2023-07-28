<?php
$p = isset($_SESSION['sanpham']) ? $_SESSION['sanpham'] : '';
$name = $images = $category = $price = $description = $amount = $show = "";

if (isset($_POST['btOk'])) {
	$name = isset($_POST['txname']) && $_POST['txname'] != null ? $_POST['txname'] : '';
	//upload file image
	$file = $_FILES['img'];
	if ($file['name'] == null) {//nếu không chọn file ảnh mới thì sẽ giữ lại file ảnh  cũ
		
		$images = $hinhanh;
	}else{
		if ($file['size'] > 1048576) {
			echo "File không được lớn hơn 1MB";
		}else{
			$images = $file['name'];
			move_uploaded_file($file['tmp_name'], "view/template/image/".$images);
		}
	}
	$price = isset($_POST['txprice']) ? $_POST['txprice'] : '';
	$amount = isset($_POST['txamount']) ? $_POST['txamount'] : '';
	$show = isset($_POST['show']) ? $_POST['show'] : '';
	$category = isset($_POST['category']) ? $_POST['category'] : '';
	$description = $_POST['txdescription'] && $_POST['txdescription'] != null ? $_POST['txdescription'] :'';
	include_once("model/product.php");
	$p = new Product();
	if (isset($_GET['id'])) {
		$p->update($id,$name, $images, $category, $price, $description, $amount,$show);
		echo $category;
	}else{
		$p->insert($name, $images, $category,$price, $description, $amount,$show);
	}
	header("location:index.php?page=product");
}
?>