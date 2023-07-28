<?php if(isset($_SESSION['username'])){ ?>
<p style="font-size: 1.1em; text-align: right; padding-top: 10px; padding-right: 32px;">
Chào mừng <a href="#" style="font-size: 1.2em; color: red; font-weight: bold;"><?php echo $_SESSION['username'];?></a> đã đăng nhập vào hệ thống quản trị
<a href="index.php?page=logout" style="margin-right: 5px; padding-right: 5px; border-left: 1px solid black; padding-left: 10px;">Đăng xuất</a>
</p>
<div id="logo">
	<a href="index.php"><img src="view/template/image/logo1.png"></a>
</div>
<ul id="menu">
	<li><a href="index.php">Trang chủ</a></li>
	<li><a href="index.php?page=user">Tài khoản</a></li>
</ul>
<div id="banner">
	<a href="index.php"><img src="view/template/image/top-slide-bn-01.jpg" width="90%"></a>
</div>
<?php }
else{ ?>
<p style="font-size: 1.1em; text-align: right; padding-top: 10px; padding-right: 32px;">
Chào mừng <a href="#" style="font-size: 1.2em; color: red; font-weight: bold;"><?php echo $_SESSION['username1'];?></a> đã đăng nhập vào hệ thống quản trị
<a href="index.php?page=logout" style="margin-right: 5px; padding-right: 5px; border-left: 1px solid black; padding-left: 10px;">Đăng xuất</a>
</p>
<div id="logo">
	<a href="index.php"><img src="view/template/image/logo1.png"></a>
</div>
<ul id="menu">
	<li><a href="index.php">Trang chủ</a></li>
	<li><a href="index.php?page=product">Sản phẩm</a></li>	
	<li><a href="index.php?page=user">Tài khoản</a></li>
	<li><a href="index.php?page=order">Đơn hàng</a></li>
</ul>
<div id="banner">
	<a href="index.php"><img src="view/template/image/top-slide-bn-01.jpg" width="90%"></a>
</div>	
<?php } ?>