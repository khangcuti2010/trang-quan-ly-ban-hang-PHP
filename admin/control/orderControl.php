<?php
include_once("model/order.php");
$order = new Order();
$_SESSION['list_Order'] = $order->getList();

$action = isset($_GET['action']) && $_GET['action'] != null ? $_GET['action'] : '';
switch ($action) {

	case 'update':
		$id = isset($_GET['id']) && $_GET['id'] != null ? $_GET['id'] :'';
		$_SESSION['category'] = $order->getListCategory();
		$_SESSION['order'] = $order->getOne($id);
		include_once("view/order/form.php");
		include_once("control/orderProcess.php");
		break;
	case 'delete':
		$id = isset($_GET['id']) && $_GET['id'] != null ? $_GET['id'] :'';
		$order->delete($id);
		header("location:index.php?page=order");
		break;
	case 'detail':
		$id = isset($_GET['id']) && $_GET['id'] != null ? $_GET['id'] :'';
		$_SESSION['SANPHAM'] = $order->getListSanpham();
		$sql="SELECT * FROM chitietdonhang INNER JOIN sanpham ON chitietdonhang.ID_SanPham = sanpham.ID_SanPham WHERE ID_DonHang = '$id'";
		$sql1="SELECT TongTien FROM donhang WHERE ID_DonHang='$id'";
		$conn=mysqli_connect("localhost", "root", "", "web2_clothesshop");
		$result = mysqli_query($conn,$sql);
		$result1 = mysqli_query($conn,$sql1);
		$row1 = mysqli_fetch_assoc($result1);
		$num = mysqli_num_rows($result) ?>
		<table border="1" width="92%">
		<tr style="background:#7f827b; height: 50px; text-align: center; font-weight: bold;">
			<td>Mã Đơn Hàng</td>
			<td>Tên Sản Phẩm</td>
			<td>Số Lượng</td>
			<td>Giá</td>
		</tr>
		<?php while ($row = mysqli_fetch_assoc($result)) { ?>
		<tr>
			<td style="font-weight: bold; text-align: center;" width="10%"><?php echo $row['ID_DonHang'];?></td>
			<td style="font-weight: bold; text-align: center;" width="10%"><?php echo $row['TenSanPham'];?></td>
			<td style="font-weight: bold; text-align: center;" width="10%"><?php echo $row['SoLuong'];?></td>
			<td style="font-weight: bold; text-align: center;" width="10%"><?php echo $row['Gia'];?> đồng</td>
		</tr>
		<?php } ?>
		</table>
		<div style="background:#7f827b; height: 25px; text-align: center; font-weight: bold; width: 23%">Tổng Tiền:<?php echo $row1['TongTien']; ?> đồng</div>
		<?php break; 
 	default:
		if (!isset($_GET['p'])) {
			$pages = 1;
		}else{
			$pages = $_GET['p'];
		}
		$limit = 6;
		$totalPage = ceil(count($_SESSION['list_Order'])/$limit);
		$start = ($pages - 1) * $limit;
		$listOrder = $order->getListPage($start,$limit);
		// $_SESSION['list_Page_News'] = $news->getListPage($start,$limit);
		include_once("view/order/list.php");
		break;
}
?>