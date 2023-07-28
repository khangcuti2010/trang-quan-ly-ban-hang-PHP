<?php
include_once("model/product.php");
$product = new Product();
$list = $product->getList();

$action = isset($_GET['action']) && $_GET['action'] != null ? $_GET['action'] : '';
switch ($action) {
	case 'insert':
		$_SESSION['category'] = $product->getListCategory();
		include_once("view/product/form.php");
		include_once("productProcess.php");
		break;
	case 'update':
		$id = isset($_GET['id']) && $_GET['id'] != null ? $_GET['id'] :'';
		$_SESSION['category'] = $product->getListCategory();
		$_SESSION['product'] = $product->getOne($id);
		include_once("view/product/form.php");
		include_once("productProcess.php");
		break;
	case 'delete':
		$id = isset($_GET['id']) && $_GET['id'] != null ? $_GET['id'] :'';
		$product->delete($id);
		header("location:index.php?page=product");
		break;
	default:
		if (!isset($_GET['p'])) {
			$pages = 1;
		}else{
			$pages = $_GET['p'];
		}
		$limit = 10;
		$_SESSION['totalPage1'] = ceil(count($list)/ $limit);
		$start = ($pages - 1) * $limit;
		$_SESSION['listPage1'] = $product->getListPage($start, $limit);
			
		include_once("view/product/list.php");
		break;
}
?>