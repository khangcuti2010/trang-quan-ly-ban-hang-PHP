<?php
 	$order = isset($_GET['id']) ? $_SESSION['order'] : '';
?>
<div>
	<h2 style="text-align: center; color: red; margin-bottom:20px;"><?php echo isset($_GET['id']) ? "Sửa đơn hàng" : "Thêm sản phẩm";?></h2>
	<form action="" method="post" enctype="multipart/form-data">
		<table style="margin-left: 150px;">

		<tr>
			<td><label>Trạng Thái</label></td>
			<td style="padding: 7px 7px;"><select name="category" style="height: 30px;">
					<option value="0">------Trạng Thái-----</option>
				<?php foreach ($_SESSION['category'] as $value) { ?>
					<option value="<?php echo $value['ID_TrangThai'];?>">
						<?php echo $value['ID_TrangThai']." - ".$value['TenTrangThai'];?>
					</option>
				<?php } ?>
			</select></td>
		</tr>

		<tr>
			<td></td>
			<td style="padding: 7px 7px;"><input type="submit" name="btOk_order" value="<?php echo isset($_GET['id']) ? "Sửa" : "Thêm";?>" style="padding:5px 10px; font-weight: bold;"></td>
		</tr>
	</table>
	</form>
</div>