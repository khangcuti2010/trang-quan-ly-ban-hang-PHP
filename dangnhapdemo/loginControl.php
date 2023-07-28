<?php
include_once("user.php");
$user = new User();

	if (isset($_POST['btLogin'])) {
		if (!isset($_POST['txuser']) || !isset($_POST['txpass'])) {
			echo "Mời bạn nhập đầy đủ thông tin";
		}else{
			$txuser = $_POST['txuser'];
			$txpass = $_POST['txpass']; 
			$row = $user->login($txuser,$txpass);
			if ($row > 0) {
				 $_SESSION["user"] = $txuser;
              	 $_SESSION["pass"] = $txpass;

              	 	header("location:admin/index.php");
              	 
              	 echo "<script>alert('Đăng nhập thành công')</script>";
			}else{
				echo "<script>alert('Đăng nhập thất bại')</script>";
			}
		}
	}
	include_once("login.php");
?>