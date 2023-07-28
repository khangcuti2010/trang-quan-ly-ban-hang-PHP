<?php
include_once("library/config.php");
include_once("library/data.php");

class User extends Data{

	public function getList(){
		$db = new Data();
		$db->query("SELECT * FROM khachhang");
		return $db->getAll();
	}

	public function getAuthority(){
		$db = new Data();
		$db->query("SELECT * FROM authority");
		return $db->getAll();
	}

	public function getOne($id){
		$db = new Data();
		$db->query("SELECT * FROM khachhang WHERE ID_KH = $id");
		return $db->getOneFirst();
	}

	public function insert($username,$password,$fullname,$tell,$address,$permit,$note,$daysign){
		$db = new Data();
		$db->query("INSERT INTO `khachhang`(`TenDangNhap`, `Password`, `HoTen`, `Sdt`,`DiaChi`,`QuyenHan`,`GhiChu`,`NgayDangKy`) VALUES('$username','$password','$fullname','$tell','$address','$permit','$note',now())");
	}

	public function update($id_User,$username,$password,$fullname,$tell,$address,$permit,$note,$daysign){
		$db = new data(); 
		$db->query("UPDATE `khachhang` SET `TenDangNhap` = '$username', `Password` ='$password', `HoTen`= '$fullname', `Sdt` ='$tell', `DiaChi` = '$address', `QuyenHan` = '$permit', `GhiChu` = '$note', `NgayDangKy` = '$daysign'  WHERE `ID_KH` = '$id_User'");
	}

	public function delete($id){
		$db = new data();
		$db->query("DELETE FROM khachhang WHERE ID_KH = '$id'");
	}
}
?>