<div>
	<h2 style="text-align: center; color: red; margin-bottom: 20px;">Quản lý tài khoản</h2>
	<h3 style="text-align: center;">Thêm tài khoản</h3>
	<a href="index.php?page=user&action=insert" style="margin-left: 420px;"><img src="view/template/image/themicon.png" width="70px" height="60px" style="border-radius:10px;"></a>
	<table border="1" width="80%" style="margin-left:50px;">
		<tr style="background:#7f827b; height: 50px; text-align: center; font-weight: bold;">
			<td>Mã khách hàng</td>
			<td width="15%">Tài khoản</td>
			<td>Mật khẩu</td>
			<td>Họ tên</td>
			<td>Số Điện Thoại</td>
			<td>Quyền Hạn</td>
			<td>Ghi Chú</td>
			<td>Ngày Đăng Ký</td>
			<td width="8%">Sửa</td>
			<td width="7%">Xóa</td>
		</tr>
		<?php foreach ($_SESSION['list_User'] as $value) { ?>
		<tr>
			<td style="text-align: center; font-weight: bold;"><?php echo $value['ID_KH'];?></td>
			<td style="text-align: center; font-weight: bold;"><?php echo $value['TenDangNhap'];?></td>
			<td style="text-align: center; font-weight: bold;"><?php echo $value['Password'];?></td>
			<td style="text-align: center;"><?php echo $value['HoTen'];?></td>
			<td style="text-align: center;"><?php echo $value['Sdt'];?></td>
			<td style="text-align: center;"><?php echo $value['QuyenHan'];?></td>
			<td style="text-align: center;"><?php echo $value['GhiChu'];?></td>
			<td style="text-align: center;"><?php echo date("d-m-Y", strtotime($value['NgayDangKy']));?></td>
			<td style="padding-left:5px;"><a href="index.php?page=user&action=update&id=<?php echo $value['ID_KH'];?>"><img src="view/template/image/suaicon.jpg" width="50px" height="40px" style="border-radius:10px;"></a></td>
			<td><a href="index.php?page=user&action=delete&id=<?php echo $value['ID_KH'];?>" onClick="return confirm('Bạn có chắc chắn muốn xóa?');"><img src="view/template/image/xoaicon.png" width="60px" height="50px"></a></td>
		</tr>
		<?php } ?>
	</table>
</div> 