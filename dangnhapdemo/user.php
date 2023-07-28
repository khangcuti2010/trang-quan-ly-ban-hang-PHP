<?php
include_once("library/config.php");
include_once("library/data.php");

class User extends Data{
	
	public function login($user, $pass){
		$db = new Data();
		$db->query("SELECT * FROM khachhang WHERE TenDangNhap = '$user' AND Password = '$pass'");
		return $db->num_row();
	}

	public function getOne($user, $pass){
		$db = new Data();
		$db->query("SELECT * FROM khachhang WHERE TenDangNhap = '$user' AND Password = '$pass'");
		return $db->getOneFirst();
	}

	public function register($username,$password,$fullname,$birthday,$sex){
		$db = new Data();
		$db->query("INSERT INTO `user`(`username`, `password`, `fullname`, `birthday`,`sex`) VALUES('$username','$password','$fullname','$birthday','$sex')");
	}
}
?>