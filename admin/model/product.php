<?php
include_once("library/config.php");
include_once("library/data.php");

class Product extends Data{

	public function getList(){
		$db = new Data();
		$db->query("SELECT * FROM sanpham");
		return $db->getAll();
	}

	public function getOne($id){
		$db = new Data();
		$db->query("SELECT * FROM sanpham WHERE ID_SanPham = $id");
		return $db->getOneFirst();
	}

	public function insert($name,$images,$category,$price,$description,$amount,$show){
		$db = new Data();
		$db->query("INSERT INTO `sanpham`(`TenSanPham`, `Hinh`, `ID_TheLoai`, `GiaTien`, `MoTa`, `SoLuong`, `HienThi`) VALUES('$name','$images','$category','$price','$description','$amount','$show')");
	}

	public function update($id,$name,$images,$category,$price,$description,$amount,$show){
		$db = new data();
		$db->query("UPDATE `sanpham` SET `TenSanPham` = '$name', `Hinh` ='$images', `ID_TheLoai` ='$category', `GiaTien`= '$price', `MoTa` ='$description', `SoLuong` ='$amount', `HienThi` ='$show' WHERE `ID_SanPham` = '$id'");
	}

	public function delete($id){
		$db = new data();
		$db->query("UPDATE sanpham SET HienThi = '0' WHERE ID_SanPham = '$id'");
	}

	public function getListPage($start, $limit){//lấy ra số bản ghi tối đa trong 1 page bắt đầu từ bản ghi $start
		$db = new Data();
		$db->query("SELECT * FROM sanpham INNER JOIN theloai ON sanpham.ID_TheLoai = theloai.ID_TheLoai LIMIT $start,$limit");
		return $db->getAll();
	}
	
	public function getListCategory(){
		$db = new Data();
		$db->query("SELECT * FROM theloai");
		return $db->getAll();
	}
}
?>