<?php 
if (isset($_GET['id'])) {
	$p = $_SESSION['product'];
}
?>
<div>
	<h2 style="text-align: center; color: red; margin-bottom:20px;"><?php echo isset($_GET['id']) ? "Sửa sản phẩm" : "Thêm sản phẩm";?></h2>
	<form action="" method="post" enctype="multipart/form-data">
		<table style="margin-left: 150px;">
		<tr>
			<td width="20%" style="font-weight: bold;">Tên sản phẩm</td>
			<td style="padding: 7px 7px;"><input type="text" name="txname" value="<?php echo isset($_GET['id']) ? $p['TenSanPham'] : '';?>" style="height: 30px;"></td>
			
		</tr>
		<tr>
			<td style="font-weight: bold;">Chọn ảnh</td>
			<td style="padding: 7px 7px;"><input type="file" name="img"></td>
			<?php $hinhanh = isset($_GET['id']) ? $p['Hinh'] : '';  ?>
			<tr>
				<td></td>

			</tr>
		</tr>
		<tr>
			<td style="font-weight: bold"><label>Thể loại</label></td>
			<td style="padding: 7px 7px;"><select name="category" style="height: 30px;">
					<option value="<?php echo isset($_GET['id']) ? $p['ID_TheLoai'] : '';?>"><?php echo isset($_GET['id']) ? $p['ID_TheLoai'] : '';?></option>
				<?php foreach ($_SESSION['category'] as $value) { ?>
					<option value="<?php echo $value['ID_TheLoai'];?>">
						<?php echo $value['ID_TheLoai']." - ".$value['TenTheLoai'];?>
					</option>
				<?php } ?>
			</select></td>
		</tr>		
		<tr>
			<td style="font-weight: bold;">Số Lượng</td>
			<td style="padding: 7px 7px;"><input type="text" name="txamount" value="<?php echo isset($_GET['id']) ? $p['SoLuong'] : '';?>" style="height: 30px;"></td>
		</tr>		
		<tr>
			<td style="font-weight: bold;">Giá Tiền</td>
			<td style="padding: 7px 7px;"><input type="text" name="txprice" value="<?php echo isset($_GET['id']) ? $p['GiaTien'] : '';?>" style="height: 30px;"> đồng</td>
		</tr>
		<tr>
			<td style="font-weight: bold;">Mô tả</td>
			<td style="padding: 7px 7px;"><textarea name="txdescription" cols="60" rows="13"><?php echo isset($_GET['id']) ? $p['MoTa'] : '';?></textarea></td>
		</tr>
		
		<tr>
			<td style="font-weight: bold"><label>Hiển Thị</label></td>
			<td style="padding: 7px 7px;"><select name="show" style="height: 30px;">
				<option value="<?php echo isset($_GET['id']) ? $p['HienThi'] : '';?>"><?php echo isset($_GET['id']) ? $p['HienThi'] : '';?></option>	
					<option value="0">0-Ẩn sản phẩm</option>
					<option value="1">1-Hiển thị sản phẩm</option>
			</select></td>
		</tr>		
		
		
		<tr>
			<td></td>
			<td style="padding: 7px 7px;"><input type="submit" name="btOk" value="<?php echo isset($_GET['id']) ? "Sửa" : "Thêm";?>" style="padding:5px 10px; font-weight: bold;"></td>
		</tr>
	</table>
	</form>
</div>