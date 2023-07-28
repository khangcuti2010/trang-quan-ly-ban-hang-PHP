<?php
include_once("../library/config.php");
include_once("../library/data.php");

class Order extends Data{

	public function getList(){
		$db = new Data();
		$db->query("SELECT * FROM donhang INNER JOIN trangthaidonhang ON donhang.TrangThai = trangthaidonhang.ID_TrangThai");
		return $db->getAll();
	}

	public function getListPage($start, $limit){
		$db = new Data();
		$db->query("SELECT * FROM donhang INNER JOIN trangthaidonhang ON donhang.TrangThai = trangthaidonhang.ID_TrangThai LIMIT $start,$limit");
		return $db->getAll();
	}

	public function getListCategory(){
		$db = new Data();
		$db->query("SELECT * FROM trangthaidonhang");
		return $db->getAll();
	}

	public function getOne($id){
		$db = new Data();
		$db->query("SELECT * FROM donhang INNER JOIN trangthaidonhang ON donhang.TrangThai = trangthaidonhang.ID_TrangThai WHERE ID_DonHang = $id");
		return $db->getOneFirst();
	}



	public function update($ID_DonHang,$TrangThai){
		$db = new data();
		$db->query("UPDATE `donhang` SET `TrangThai` = '$TrangThai' WHERE `ID_DonHang` = '$ID_DonHang'");
	}

	public function delete($id){
		$db = new data();
		$db->query("DELETE FROM donhang WHERE ID_DonHang = $id");
	}
	
	public function detail($id){
		$db = new Data();
		$db->query("SELECT * FROM chitietdonhang INNER JOIN sanpham ON chitietdonhang.ID_SanPham = sanpham.ID_SanPham WHERE ID_DonHang = '$id'");
	}
	
	public function getListSanpham(){
		$db = new Data();
		$db->query("SELECT * FROM sanpham");
		return $db->getAll();
	}
	
}
?>