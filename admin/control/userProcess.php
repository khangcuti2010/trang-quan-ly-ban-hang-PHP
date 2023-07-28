<?php 
$user = isset($_SESSION['userOne']) ? $_SESSION['userOne'] : '';
$username = $password = $fullname = $tell = $address = $permit = $note = "";
$so= "select * from khachhang where TenDangNhap = '$username'";
$con = mysqli_connect("localhost", "root", "", "web2_clothesshop");
$po = mysqli_query($con,$so);

if (isset($_POST['btUser'])) {
		$username = isset($_POST['txusername']) && $_POST['txusername'] != null ? $_POST['txusername'] :'';
$so= "select * from khachhang where TenDangNhap = '$username'";
$con = mysqli_connect("localhost", "root", "", "web2_clothesshop");
$po = mysqli_query($con,$so);
	if(mysqli_num_rows($po)>0){
		echo "<script>";
		echo 'alert("Tên đăng nhập đã tồn tại");';
		echo "</script>";
		//header("location:index.php?page=user");
		
	}
	else{
	$password = isset($_POST['txpassword']) && $_POST['txpassword'] != null ? $_POST['txpassword'] :'';
	$fullname = isset($_POST['txfullname']) && $_POST['txfullname'] != null ? $_POST['txfullname'] :'';
	$tell = isset($_POST['txtell']) && $_POST['txtell'] != null ? $_POST['txtell'] :'';
	$address = isset($_POST['txaddress']) && $_POST['txaddress'] != null ? $_POST['txaddress'] :'';
	$permit = isset($_POST['txpermit']) && $_POST['txpermit'] != null ? $_POST['txpermit'] :'';
	$note = isset($_POST['txnote']) && $_POST['txnote'] != null ? $_POST['txnote'] :'';

	$day = isset($_POST['txday']) ? $_POST['txday'] : '';
	$month = isset($_POST['txmonth']) ? $_POST['txmonth'] :'';
	$year = isset($_POST['txyear']) ? $_POST['txyear'] :'';
	$daysign = $year.'-'.$month.'-'.$day;
	// $daysign = date("Y-m-d",strtotime($newDate));



	include_once('model/user.php');
	$u = new User();
	if (isset($_GET['id'])) {
		$u->update($_GET['id'],$username,$password,$fullname,$tell,$address,$permit,$note,$daysign);
	}else{
		$u->insert($username,$password,$fullname,$tell,$address,$permit,$note,$daysign);
		echo "<script>";
		echo 'alert("dang ki thanh cong");';
		echo "</script>";
	}
	header("location:index.php?page=user");
}}
?>