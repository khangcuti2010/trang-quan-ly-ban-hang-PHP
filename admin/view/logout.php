<?php
	session_start();
    unset($_SESSION['username']);
    unset($_SESSION['password']);
    unset($_SESSION['username1']);
    unset($_SESSION['password1']);		
	header("location:http://localhost/Nh%c3%b3m8_Web%20b%c3%a1n%20qu%e1%ba%a7n%20%c3%a1o/Nhom8_Web_ban_quan_ao/Admin/xulylogin.php");
?>