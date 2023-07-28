<div>
	<h2 style="text-align: center; color: red; margin-bottom: 20px;">Danh sách đơn hàng</h2>
	<h3 style="text-align: center">

		<div align="center">
            <form action="index.php" method="get">
                  Từ ngày<input type="date" name="date1" />đến ngày<input type="date" name="date2" />
                <input type="submit" name="btsearchdate" value="search" />
            </form>
		</div>	
	</h3>
	<table border="1" width="92%">
		<tr style="background:#7f827b; height: 50px; text-align: center; font-weight: bold;">
			<td>Mã Đơn Hàng</td>
			<td>Mã Khách Hàng</td>
			<td width="20%">Thời Điểm Đặt Hàng</td>
			<td width="20%">Thời Điểm Giao Hàng</td>
			<td width="20%">Tên Người Nhận</td>
			<td>Địa Chỉ Giao Hàng</td>
			<td width="13%">Tổng Tiền</td>
			<td>Trạng Thái</td>
			<td>Ghi Chú</td>
			<td>Sửa</td>
			<td>Xem Chi Tiết</td>
			<td>Xóa</td>
		</tr>
		<?php foreach ($listOrder as $value) { ?>
		<tr>
			<td style="font-weight: bold; text-align: center;"><?php echo $value['ID_DonHang'];?></td>
			<td style="padding-left: 5px; padding-right: 5px;"><?php echo $value['ID_KH'];?></td>
			<td style="font-weight: bold; text-align: center;" width="10%"><?php echo $value['ThoiDiemDatHang'];?></td>
			<td style="font-weight: bold; text-align: center;" width="10%"><?php echo $value['ThoiDiemGiaoHang'];?></td>
			<td style="font-weight: bold; text-align: center;" width="10%"><?php echo $value['TenNguoiNhan'];?></td>
			<td style="font-weight: bold; text-align: center;" width="10%"><?php echo $value['DiaChiGiaoHang'];?></td>
			<td style="padding-left: 5px; padding-right: 5px; width: 10%"><?php echo $value['TongTien'];?> đồng</td>
			<td style="padding-left: 5px; padding-right: 5px;"><?php echo $value['TenTrangThai'];?></td>
			<td style="padding-left: 5px; padding-right: 5px;"><?php echo $value['GhiChu'];?></td>
			<td style="padding-left:5px;"><a href="index.php?page=order&action=update&id=<?php echo $value['ID_DonHang'];?>"><img src="view/template/image/suaicon.jpg" width="50px" height="40px" style="border-radius:10px;"></a></td>
			<td style="padding-left:5px;"><a href="index.php?page=order&action=detail&id=<?php echo $value['ID_DonHang'];?>"><img src="view/template/image/xemthongtinicon.png" width="50px" height="40px" style="border-radius:10px;"></a></td>
			<td><a href="index.php?page=order&action=delete&id=<?php echo $value['ID_DonHang'];?>" onClick="return confirm('Bạn có chắc chắn muốn xóa?');"><img src="view/template/image/xoaicon.png" width="60px" height="50px"></a></td>
		</tr>
		<?php } ?>
	</table>
	<div style="padding-left: 400px; padding-top: 30px;">
		<?php for($i = 1; $i <= $totalPage; $i++){ ?>
			<p class="page"><a href="index.php?page=order&p=<?php echo $i;?>"><?php echo $i;?></a></p>
		<?php }?>
	</div>
</div>