<?php if (isset($_GET['id']) && isset($_SESSION['userOne'])) {
	$user = $_SESSION['userOne'];
};?>
<div>
<h2  style="text-align: center; color: red; margin-bottom:20px;"><?php echo isset($_GET['id']) ? "Sửa tài khoản" : "Thêm tài khoản";?></h2>
<form action="" method="post">
	<table style="margin-left: 200px;" width="400px">
		<tr>
			<td width="35%" style="font-weight: bold;">Tên Đăng Nhập</td>
			<td style="padding: 7px 7px;"><input type="text" name="txusername" value="<?php echo isset($_GET['id']) ? $user['TenDangNhap'] : '';?>" style="height: 25px;width: 200px;"></td>
		</tr>
		<tr>
			<td style="font-weight: bold;">Mật khẩu</td>
			<td style="padding: 7px 7px;"><input type="text" name="txpassword" value="<?php echo isset($_GET['id']) ? $user['Password'] : '';?>" style="height: 25px; width: 200px;"></td>
		</tr>
		<tr>
			<td style="font-weight: bold;">Họ tên</td>
			<td style="padding: 7px 7px;"><input type="text" name="txfullname" value="<?php echo isset($_GET['id']) ? $user['HoTen'] : '';?>" style="height: 25px;width: 200px;"></td>
		</tr>
		<tr>
			<td style="font-weight: bold;">Số Điện thoại</td>
			<td style="padding: 7px 7px;"><input type="text" name="txtell" value="<?php echo isset($_GET['id']) ? $user['Sdt'] : '';?>" style="height: 25px;width: 200px;"></td>
		</tr>
		<tr>
			<td style="font-weight: bold;">Địa Chỉ</td>
			<td style="padding: 7px 7px;"><input type="text" name="txaddress" value="<?php echo isset($_GET['id']) ? $user['DiaChi'] : '';?>" style="height: 25px;width: 200px;"></td>
		</tr>
		<tr>
			<td style="font-weight: bold;">Quyền Hạn</td>
			<td style="padding: 7px 7px;"><input type="text" name="txpermit" value="<?php echo isset($_GET['id']) ? $user['QuyenHan'] : '';?>" style="height: 25px;width: 200px;"></td>
		</tr>
		<tr>
			<td style="font-weight: bold;">Ghi Chú</td>
			<td style="padding: 7px 7px;"><input type="text" name="txnote" value="<?php echo isset($_GET['id']) ? $user['GhiChu'] : '';?>" style="height: 25px;width: 200px;"></td>
		</tr>		
		



		<tr>
			<td></td>
			<td style="padding: 7px 7px;"><input style="padding: 5px 10px;" type="submit" name="btUser" value="<?php echo isset($_GET['id']) ? "Sửa" : "Thêm";?>"></td>
		</tr>
	</table>
</form>
</div>
