<?php include_once("loginControl.php")
?>

<h2 style="text-align: center; color: red; margin-bottom: 20px;">Đăng nhập hệ thống</h2>
<form action="" method="POST" style="">
	<table width="50%" style="margin-left:220px;">
		<tr>
			<td width="30%"><label style="font-weight: bold;">Tài khoản</label></td>
			<td><input type="text" name="txuser" style="width: 170px; height: 10px; margin: 10px; border-radius:5px; padding: 10px 20px; border: 1px solid #797e78;"></td>
		</tr>
		<tr>
			<td><label style="font-weight: bold;">Mật khẩu</label></td>
			<td><input type="password" name="txpass" style="width: 170px; height: 10px; margin: 10px; border-radius: 5px; padding: 10px 20px; border: 1px solid #797e78;"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="btLogin" value="Đăng nhập" style="padding: 5px 10px; margin: 10px; font-weight: bold; border: 1px solid #797e78;"></td>
		</tr>
	</table>
</form>