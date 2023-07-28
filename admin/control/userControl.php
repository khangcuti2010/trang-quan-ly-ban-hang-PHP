<?php
include_once("model/user.php");
$user = new User();
$_SESSION['list_User'] = $user->getList();

$action = isset($_GET['action']) && $_GET['action'] != null ? $_GET['action'] : '';
switch ($action) {
	case 'insert':
		include_once("view/user/form.php");
		include_once("userProcess.php");
		break;
	case 'update':
		$id = isset($_GET['id']) && $_GET['id'] != null ? $_GET['id'] :'';
		$_SESSION['userOne'] = $user->getOne($id);
		include_once("view/user/form.php");
		include_once("userProcess.php");
		break;
	case 'delete':
		$id = isset($_GET['id']) && $_GET['id'] != null ? $_GET['id'] :'';
		$user->delete($id);
		header("location:index.php?page=user");
		break;
	default:
		include_once("view/user/list.php");
		break;
}
?>