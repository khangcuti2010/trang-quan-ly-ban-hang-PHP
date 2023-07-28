
<?php
session_start();
include_once('library/config.php');
include_once('library/data.php');
$cookie_time = (3600 * 24 * 30);
$db = new Data();
	
	 
	    //kiem tra cookid xem da tôn tai chua
	 
	    //neu chua thi minh ha dang nhap;
if(!$db){echo "loi ket noi";}
	if(empty($_SESSION['username'])){
	 	if(isset($cookie_name)){
	 		if(isset($_COOKIE[$cookie_name])){
	 				parse_str($_COOKIE[$cookie_name]);
					$sql2="select * from khachhang where TenDangNhap='$usr' and Password='$hash'";
	 				$result2=$db->query($sql2);
	 					if($result2){
	 						header('location:admin/index.php');
							exit;
						}
			}
		}
	}
	else{
	 		header('location:admin/index.php');
			exit;
	}   
	 
	 
	    if(isset($_POST['submit'])){
			$username=$_POST['username'];
	        $password=$_POST['password'];
	        $a_check=((isset($_POST['remember'])!=0)?1:"");

				$ketnot=mysqli_connect("localhost","root","","web2_clothesshop");
				$sql3="SELECT * FROM khachhang WHERE TenDangNhap='$username' and Password='$password' and QuyenHan=1";
				echo $sql3;
				$result=mysqli_query($ketnot,$sql3);
	            $row=mysqli_fetch_array($result);
				$f_user=$row['TenDangNhap'];
				$f_pass=$row['Password'];
				if($f_user==$username && $f_pass==$password){
					$_SESSION['username']=$f_user;
					$_SESSION['password']=$f_pass;
					if($a_check==1){
						setcookie ($cookie_name, 'usr='.$f_user.'&hash='.$f_pass, time() + $cookie_time);
					}
					header('location:admin/index.php');
					exit;
				}
			$username1=$_POST['username'];
	        $password1=$_POST['password'];
				$sql4="SELECT * FROM khachhang WHERE TenDangNhap='$username1' and Password='$password1' and QuyenHan=2";
				echo $sql4;
				$result1=mysqli_query($ketnot,$sql4);
	            $row1=mysqli_fetch_array($result1);
				$f_user1=$row1['TenDangNhap'];
				$f_pass1=$row1['Password'];
				if($f_user1==$username1 && $f_pass1==$password1){
					$_SESSION['username1']=$f_user1;
					$_SESSION['password1']=$f_pass1;
					if($a_check==1){
						setcookie ($cookie_name, 'usr='.$f_user.'&hash='.$f_pass, time() + $cookie_time);
					}
					header('location:admin/index.php');
					exit;
				}
			}
			
		

			
		
?>
<!DOCTYPE html>

<html>
	

<head>

    <title>Login Remember</title>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="css/style2.css">

</head>

<body>

<div class="container">

    <div class="form">

        <form action="xulylogin.php" method="post">

                 <h3 class="btn btn-primary form-control">Login Infomation</h3>

                 <table class="table">

                     <tr>

                         <td><label class="label label-danger">Username</label></td>

                         <td><input type="text"  class="form-control" name="username" value=""></td>

                     </tr>

                     <tr>

                         <td><label class="label label-danger">Password</label></td>

                         <td><input type="password" class="form-control" name="password" value=""></td>

                     </tr>

                     <tr>

                         <td colspan="2">

                             <div class="remember">

                                 <input type="checkbox"  name="remember" value="1">

                                 <label>Remember login</label>

                             </div>

                         </td>

                     </tr>

                     <tr>

                         <td colspan="2">

                             <input type="submit" class="form-control btn-info submit_login" value="Login" name="submit">

                         </td>

                     </tr>

                 </table>

            

        </form>

    </div>


</div>

<script type="text/javascript" src="js/bootstrap.min.js"></script>

</body>

</html>
