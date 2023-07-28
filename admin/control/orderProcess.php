<?php
$order = $_SESSION['order'];

$TrangThai = "";
if (isset($_POST['btOk_order'])) {
	if ($_POST['category'] == 0) {//nếu không chọn ô textbox thì nó sẽ giữ nguyên giá trị id cũ
		$TrangThai = $order['TrangThai'];
	}else{
		$TrangThai = $_POST['category'];
	}
	
	include_once("model/order.php");
	$order = new Order();
	if (isset($_GET['id'])) {
		$order->update($_GET['id'],$TrangThai);
	}
	header("location:index.php?page=order");
}
?>