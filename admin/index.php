<?php 
session_start();
ob_start(); 
?>
<!DOCTYPE html>
<html>
<head>
	<title>CHUU</title>
	<meta charset = "utf-8">
	<link rel="stylesheet" type="text/css" href="template/css/style.css">
</head>
<body>
<?php if(isset($_SESSION['username']) && isset($_SESSION['password'])){?>
	<div id="container">
		<div id="header">
			<?php include("template/header.php") ?>
		</div>
		<div class="content">
			<?php
			$pageArray = array('introduce','user','logout');
			if (isset($_GET['page'])) {
				$page = $_GET['page'];
				if (in_array($page,$pageArray)) {
					if($page == 'introduce' || $page == 'logout'){
						include('view/'.$page.'.php');
					}else{
						include('control/'.$page.'Control.php');
					}	
				}
			
			} 

		
if (isset($_REQUEST['btsearch'])) 
        {
            // Gán hàm addslashes để chống sql injection
            $search = addslashes($_GET['txsearch']);
 
            // Nếu $search rỗng thì báo lỗi, tức là người dùng chưa nhập liệu mà đã nhấn submit.
            if (empty($search)) {
                echo "Yeu cau nhap du lieu vao o trong";
            } 
            else
            {
                // Dùng câu lênh like trong sql và sứ dụng toán tử % của php để tìm kiếm dữ liệu chính xác hơn.
                $sql = "select * from sanpham INNER JOIN theloai ON sanpham.ID_TheLoai = theloai.ID_TheLoai where sanpham.TenSanPham like '%$search%'";
 
                // Kết nối sql
                $conn=mysqli_connect("localhost", "root", "", "web2_clothesshop");
 
                // Thực thi câu truy vấn
                $result = mysqli_query($conn,$sql);
 
                // Đếm số đong trả về trong sql.
                $num = mysqli_num_rows($result);
 
                // Nếu có kết quả thì hiển thị, ngược lại thì thông báo không tìm thấy kết quả
                if ($num > 0 && $search != "") 
                {
                    // Dùng $num để đếm số dòng trả về.
                    echo "$num ket qua tra ve voi tu khoa <b>$search</b>"; 
 
                    // Vòng lặp while & mysql_fetch_assoc dùng để lấy toàn bộ dữ liệu có trong table và trả về dữ liệu ở dạng array. ?>
		<table border="1" width="92%">
		<tr style="background:#7f827b; height: 50px; text-align: center; font-weight: bold;">
			<td width="8%">Mã Sản Phẩm</td>
			<td width="13%">Tên sản phẩm</td>
			<td>Ảnh minh họa</td>
			<td width="8%">Thể Loại</td>
			<td width="13%">Giá Tiền</td>
			<td width="8%">Số Lượng</td>
			<td>Mô tả</td>
			<td width="8%">Hiển thị</td>
			<td width="8%">Sửa</td>
			<td width="7%">Xóa</td>
		</tr>
                <?php    while ($row = mysqli_fetch_assoc($result)) { ?>
		<tr>
			<td style="font-weight: bold; text-align: center;"><?php echo $row['ID_SanPham'];?></td>
			<td style="font-weight: bold; text-align: center;"><?php echo $row['TenSanPham'];?></td>
			<td><img src="view/template/image/<?php echo $row['Hinh'];?>" width="120px" height="100px" style="border: 1px solid #7f827b; border-radius:10px;"></td>
			<td style="font-weight: bold; text-align: center;"><?php echo $row['TenTheLoai'];?></td>
			<td style="text-align: center;"><?php echo number_format($row['GiaTien']);?> đồng</td>
			<td style="font-weight: bold; text-align: center;"><?php echo $row['SoLuong'];?></td>
			<td style="text-align: center;"><?php echo $row['MoTa'];?></td>
			<td style="font-weight: bold; text-align: center;"><?php echo $row['HienThi'];?></td>			
			<td style="padding-left:5px;"><a href="index.php?page=product&action=update&id=<?php echo $row['ID_SanPham'];?>"><img src="view/template/image/suaicon.jpg" width="50px" height="40px" style="border-radius:10px;"></a></td>
			<td><a href="index.php?page=product&action=delete&id=<?php echo $row['ID_SanPham'];?>" onClick="return confirm('Bạn có chắc chắn muốn xóa?');"><img src="view/template/image/xoaicon.png" width="60px" height="50px"></a></td>
		</tr>						
                   <?php } 

                } 

            }
        } ?>
																	   
		</table>
<?php if (isset($_REQUEST['btsearchdate'])) 
        {
            // Gán hàm addslashes để chống sql injection
            $search1 = addslashes($_GET['date1']);
			$search2 = addslashes($_GET['date2']);
 
            // Nếu $search rỗng thì báo lỗi, tức là người dùng chưa nhập liệu mà đã nhấn submit.
            if (empty($search1) || empty($search2)) {
                echo "Yeu cau nhap du lieu vao o trong";
            } 
            else
            {
                // Dùng câu lênh like trong sql và sứ dụng toán tử % của php để tìm kiếm dữ liệu chính xác hơn.
                $sql = "select * from donhang INNER JOIN trangthaidonhang ON donhang.TrangThai = trangthaidonhang.ID_TrangThai where (donhang.ThoiDiemGiaoHang >= '$search1' AND donhang.ThoiDiemGiaoHang<='$search2' )";
				$sql1 = "select SUM(TongTien) from donhang where (donhang.ThoiDiemGiaoHang >= '$search1' AND donhang.ThoiDiemGiaoHang<='$search2' )";
 
                // Kết nối sql
                $conn=mysqli_connect("localhost", "root", "", "web2_clothesshop");
 
                // Thực thi câu truy vấn
                $result = mysqli_query($conn,$sql);
				$result1 = mysqli_query($conn,$sql1);
				$row1 = mysqli_fetch_assoc($result1);
 
                // Đếm số đong trả về trong sql.
                $num = mysqli_num_rows($result);
 
                // Nếu có kết quả thì hiển thị, ngược lại thì thông báo không tìm thấy kết quả
                if ($num > 0) 
                {
                    // Dùng $num để đếm số dòng trả về.
                    echo "$num ket qua tra ve tu <b>$search1</b> đến <b>$search2</b>"; 
 
                    // Vòng lặp while & mysql_fetch_assoc dùng để lấy toàn bộ dữ liệu có trong table và trả về dữ liệu ở dạng array. ?>

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
		 <?php while ($row = mysqli_fetch_assoc($result)) { ?> 
		<tr>
			<td style="font-weight: bold; text-align: center;"><?php echo $row['ID_DonHang'];?></td>
			<td style="padding-left: 5px; padding-right: 5px;"><?php echo $row['ID_KH'];?></td>
			<td style="font-weight: bold; text-align: center;" width="10%"><?php echo $row['ThoiDiemDatHang'];?></td>
			<td style="font-weight: bold; text-align: center;" width="10%"><?php echo $row['ThoiDiemGiaoHang'];?></td>
			<td style="font-weight: bold; text-align: center;" width="10%"><?php echo $row['TenNguoiNhan'];?></td>
			<td style="font-weight: bold; text-align: center;" width="10%"><?php echo $row['DiaChiGiaoHang'];?></td>
			<td style="padding-left: 5px; padding-right: 5px; width: 10%"><?php echo $row['TongTien'];?> đồng</td>
			<td style="padding-left: 5px; padding-right: 5px;"><?php echo $row['TenTrangThai'];?></td>
			<td style="padding-left: 5px; padding-right: 5px;"><?php echo $row['GhiChu'];?></td>
			<td style="padding-left:5px;"><a href="index.php?page=order&action=update&id=<?php echo $row['ID_DonHang'];?>"><img src="view/template/image/suaicon.jpg" width="50px" height="40px" style="border-radius:10px;"></a></td>
			<td style="padding-left:5px;"><a href="index.php?page=order&action=detail&id=<?php echo $row['ID_DonHang'];?>"><img src="view/template/image/xemthongtinicon.png" width="50px" height="40px" style="border-radius:10px;"></a></td>
			<td><a href="index.php?page=order&action=delete&id=<?php echo $row['ID_DonHang'];?>" onClick="return confirm('Bạn có chắc chắn muốn xóa?');"><img src="view/template/image/xoaicon.png" width="60px" height="50px"></a></td>
		</tr>
                   <?php } 

                }
				else{
					echo "không có kết quả";
				}

            
	?> <div style="background:#7f827b; height: 25px; text-align: center; font-weight: bold; width: 23%">Tổng Doanh Thu:<?php echo $row1['SUM(TongTien)']; ?> đồng</div>		
      <?php } 
			} ?>
																	   
		</table>
			
<?php if (isset($_REQUEST['btsearch1'])) 
        {
            // Gán hàm addslashes để chống sql injection
            $search = addslashes($_GET['category']);
 
            // Nếu $search rỗng thì báo lỗi, tức là người dùng chưa nhập liệu mà đã nhấn submit.
            if (empty($search)) {
                echo "Yeu cau nhap du lieu vao o trong";
            } 
            else
            {
                // Dùng câu lênh like trong sql và sứ dụng toán tử % của php để tìm kiếm dữ liệu chính xác hơn.
                $sql = "select * from sanpham INNER JOIN theloai ON sanpham.ID_TheLoai = theloai.ID_TheLoai where sanpham.ID_TheLoai ='$search'";
 
                // Kết nối sql
                $conn=mysqli_connect("localhost", "root", "", "web2_clothesshop");
 
                // Thực thi câu truy vấn
                $result = mysqli_query($conn,$sql);
 
                // Đếm số đong trả về trong sql.
                $num = mysqli_num_rows($result);
 
                // Nếu có kết quả thì hiển thị, ngược lại thì thông báo không tìm thấy kết quả
                if ($num > 0 && $search != "") 
                {
                    // Dùng $num để đếm số dòng trả về.
                    echo "$num ket qua tra ve"; 
 
                    // Vòng lặp while & mysql_fetch_assoc dùng để lấy toàn bộ dữ liệu có trong table và trả về dữ liệu ở dạng array. ?>
		<table border="1" width="92%">
		<tr style="background:#7f827b; height: 50px; text-align: center; font-weight: bold;">
			<td width="8%">Mã Sản Phẩm</td>
			<td width="13%">Tên sản phẩm</td>
			<td>Ảnh minh họa</td>
			<td width="8%">Thể Loại</td>
			<td width="13%">Giá Tiền</td>
			<td width="8%">Số Lượng</td>
			<td>Mô tả</td>
			<td>Hiển thị</td>
			<td width="8%">Sửa</td>
			<td width="7%">Xóa</td>
		</tr>
                <?php    while ($row = mysqli_fetch_assoc($result)) { ?>
		<tr>
			<td style="font-weight: bold; text-align: center;"><?php echo $row['ID_SanPham'];?></td>
			<td style="font-weight: bold; text-align: center;"><?php echo $row['TenSanPham'];?></td>
			<td><img src="view/template/image/<?php echo $row['Hinh'];?>" width="120px" height="100px" style="border: 1px solid #7f827b; border-radius:10px;"></td>
			<td style="font-weight: bold; text-align: center;"><?php echo $row['TenTheLoai'];?></td>
			<td style="text-align: center;"><?php echo number_format($row['GiaTien']);?> đồng</td>
			<td style="font-weight: bold; text-align: center;"><?php echo $row['SoLuong'];?></td>
			<td style="text-align: center;"><?php echo $row['MoTa'];?></td>
			<td style="font-weight: bold; text-align: center;"><?php echo $row['HienThi'];?></td>			
			<td style="padding-left:5px;"><a href="index.php?page=product&action=update&id=<?php echo $row['ID_SanPham'];?>"><img src="view/template/image/suaicon.jpg" width="50px" height="40px" style="border-radius:10px;"></a></td>
			<td><a href="index.php?page=product&action=delete&id=<?php echo $row['ID_SanPham'];?>" onClick="return confirm('Bạn có chắc chắn muốn xóa?');"><img src="view/template/image/xoaicon.png" width="60px" height="50px"></a></td>
		</tr>						
                   <?php } 

                } 

            }
        } ?>
																	   
		</table>															   
			
	<?php	
				include('view/introduce.php');
			
			?>
		</div>
		<div id="footer">
			<?php include("template/footer.php");?>
		</div>
	</div>
<?php } ?>
<?php if(isset($_SESSION['username1']) && isset($_SESSION['password1'])){?>
	<div id="container">
		<div id="header">
			<?php include("template/header.php") ?>
		</div>
		<div class="content">
			<?php
			$pageArray = array('introduce','product','user','order','logout');
			if (isset($_GET['page'])) {
				$page = $_GET['page'];
				if (in_array($page,$pageArray)) {
					if($page == 'introduce' || $page == 'logout'){
						include('view/'.$page.'.php');
					}else{
						include('control/'.$page.'Control.php');
					}	
				}
			
			} 

		
if (isset($_REQUEST['btsearch'])) 
        {
            // Gán hàm addslashes để chống sql injection
            $search = addslashes($_GET['txsearch']);
 
            // Nếu $search rỗng thì báo lỗi, tức là người dùng chưa nhập liệu mà đã nhấn submit.
            if (empty($search)) {
                echo "Yeu cau nhap du lieu vao o trong";
            } 
            else
            {
                // Dùng câu lênh like trong sql và sứ dụng toán tử % của php để tìm kiếm dữ liệu chính xác hơn.
                $sql = "select * from sanpham INNER JOIN theloai ON sanpham.ID_TheLoai = theloai.ID_TheLoai where sanpham.TenSanPham like '%$search%'";
 
                // Kết nối sql
                $conn=mysqli_connect("localhost", "root", "", "web2_clothesshop");
 
                // Thực thi câu truy vấn
                $result = mysqli_query($conn,$sql);
 
                // Đếm số đong trả về trong sql.
                $num = mysqli_num_rows($result);
 
                // Nếu có kết quả thì hiển thị, ngược lại thì thông báo không tìm thấy kết quả
                if ($num > 0 && $search != "") 
                {
                    // Dùng $num để đếm số dòng trả về.
                    echo "$num ket qua tra ve voi tu khoa <b>$search</b>"; 
 
                    // Vòng lặp while & mysql_fetch_assoc dùng để lấy toàn bộ dữ liệu có trong table và trả về dữ liệu ở dạng array. ?>
		<table border="1" width="92%">
		<tr style="background:#7f827b; height: 50px; text-align: center; font-weight: bold;">
			<td width="8%">Mã Sản Phẩm</td>
			<td width="13%">Tên sản phẩm</td>
			<td>Ảnh minh họa</td>
			<td width="8%">Thể Loại</td>
			<td width="13%">Giá Tiền</td>
			<td width="8%">Số Lượng</td>
			<td width="15%">Mô tả</td>
			<td>Hiển Thị</td>
			<td width="8%">Sửa</td>
			<td width="7%">Xóa</td>
		</tr>
                <?php    while ($row = mysqli_fetch_assoc($result)) { ?>
		<tr>
			<td style="font-weight: bold; text-align: center;"><?php echo $row['ID_SanPham'];?></td>
			<td style="font-weight: bold; text-align: center;"><?php echo $row['TenSanPham'];?></td>
			<td><img src="view/template/image/<?php echo $row['Hinh'];?>" width="120px" height="100px" style="border: 1px solid #7f827b; border-radius:10px;"></td>
			<td style="font-weight: bold; text-align: center;"><?php echo $row['TenTheLoai'];?></td>
			<td style="text-align: center;"><?php echo number_format($row['GiaTien']);?> đồng</td>
			<td style="font-weight: bold; text-align: center;"><?php echo $row['SoLuong'];?></td>
			<td style="text-align: center;"><?php echo $row['MoTa'];?></td>
			<td style="font-weight: bold; text-align: center;"><?php echo $row['HienThi'];?></td>
			<td style="padding-left:5px;"><a href="index.php?page=product&action=update&id=<?php echo $row['ID_SanPham'];?>"><img src="view/template/image/suaicon.jpg" width="50px" height="40px" style="border-radius:10px;"></a></td>
			<td><a href="index.php?page=product&action=delete&id=<?php echo $row['ID_SanPham'];?>" onClick="return confirm('Bạn có chắc chắn muốn xóa?');"><img src="view/template/image/xoaicon.png" width="60px" height="50px"></a></td>
		</tr>						
                   <?php } 

                } 

            }
        } ?>
																	   
		</table>
<?php if (isset($_REQUEST['btsearchdate'])) 
        {
            // Gán hàm addslashes để chống sql injection
            $search1 = addslashes($_GET['date1']);
			$search2 = addslashes($_GET['date2']);
 
            // Nếu $search rỗng thì báo lỗi, tức là người dùng chưa nhập liệu mà đã nhấn submit.
            if (empty($search1) || empty($search2)) {
                echo "Yeu cau nhap du lieu vao o trong";
            } 
            else
            {
                // Dùng câu lênh like trong sql và sứ dụng toán tử % của php để tìm kiếm dữ liệu chính xác hơn.
                $sql = "select * from donhang INNER JOIN trangthaidonhang ON donhang.TrangThai = trangthaidonhang.ID_TrangThai where (donhang.ThoiDiemGiaoHang >= '$search1' AND donhang.ThoiDiemGiaoHang<='$search2' )";
				$sql1 = "select SUM(TongTien) from donhang where (donhang.ThoiDiemGiaoHang >= '$search1' AND donhang.ThoiDiemGiaoHang<='$search2' )";
 
                // Kết nối sql
                $conn=mysqli_connect("localhost", "root", "", "web2_clothesshop");
 
                // Thực thi câu truy vấn
                $result = mysqli_query($conn,$sql);
				$result1 = mysqli_query($conn,$sql1);
				$row1 = mysqli_fetch_assoc($result1);
 
                // Đếm số đong trả về trong sql.
                $num = mysqli_num_rows($result);
 
                // Nếu có kết quả thì hiển thị, ngược lại thì thông báo không tìm thấy kết quả
                if ($num > 0) 
                {
                    // Dùng $num để đếm số dòng trả về.
                    echo "$num ket qua tra ve tu <b>$search1</b> đến <b>$search2</b>"; 
 
                    // Vòng lặp while & mysql_fetch_assoc dùng để lấy toàn bộ dữ liệu có trong table và trả về dữ liệu ở dạng array. ?>

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
		 <?php while ($row = mysqli_fetch_assoc($result)) { ?> 
		<tr>
			<td style="font-weight: bold; text-align: center;"><?php echo $row['ID_DonHang'];?></td>
			<td style="padding-left: 5px; padding-right: 5px;"><?php echo $row['ID_KH'];?></td>
			<td style="font-weight: bold; text-align: center;" width="10%"><?php echo $row['ThoiDiemDatHang'];?></td>
			<td style="font-weight: bold; text-align: center;" width="10%"><?php echo $row['ThoiDiemGiaoHang'];?></td>
			<td style="font-weight: bold; text-align: center;" width="10%"><?php echo $row['TenNguoiNhan'];?></td>
			<td style="font-weight: bold; text-align: center;" width="10%"><?php echo $row['DiaChiGiaoHang'];?></td>
			<td style="padding-left: 5px; padding-right: 5px; width: 10%"><?php echo $row['TongTien'];?> đồng</td>
			<td style="padding-left: 5px; padding-right: 5px;"><?php echo $row['TenTrangThai'];?></td>
			<td style="padding-left: 5px; padding-right: 5px;"><?php echo $row['GhiChu'];?></td>
			<td style="padding-left:5px;"><a href="index.php?page=order&action=update&id=<?php echo $row['ID_DonHang'];?>"><img src="view/template/image/suaicon.jpg" width="50px" height="40px" style="border-radius:10px;"></a></td>
			<td style="padding-left:5px;"><a href="index.php?page=order&action=detail&id=<?php echo $row['ID_DonHang'];?>"><img src="view/template/image/xemthongtinicon.png" width="50px" height="40px" style="border-radius:10px;"></a></td>
			<td><a href="index.php?page=order&action=delete&id=<?php echo $row['ID_DonHang'];?>" onClick="return confirm('Bạn có chắc chắn muốn xóa?');"><img src="view/template/image/xoaicon.png" width="60px" height="50px"></a></td>
		</tr>
                   <?php } 

                }
				else{
					echo "không có kết quả";
				}

            	?> </table> <div style="background:#7f827b; height: 40px; text-align: center; font-weight: bold; width:50%">Tổng Doanh Thu:<?php echo $row1['SUM(TongTien)']; ?> đồng</div>	
		<?php	}
        } ?>
																	   
			
<?php if (isset($_REQUEST['btsearch1'])) 
        {
            // Gán hàm addslashes để chống sql injection
            $search = addslashes($_GET['category']);
 
            // Nếu $search rỗng thì báo lỗi, tức là người dùng chưa nhập liệu mà đã nhấn submit.
            if (empty($search)) {
                echo "Yeu cau nhap du lieu vao o trong";
            } 
            else
            {
                // Dùng câu lênh like trong sql và sứ dụng toán tử % của php để tìm kiếm dữ liệu chính xác hơn.
                $sql = "select * from sanpham INNER JOIN theloai ON sanpham.ID_TheLoai = theloai.ID_TheLoai where sanpham.ID_TheLoai ='$search'";
 
                // Kết nối sql
                $conn=mysqli_connect("localhost", "root", "", "web2_clothesshop");
 
                // Thực thi câu truy vấn
                $result = mysqli_query($conn,$sql);
 
                // Đếm số đong trả về trong sql.
                $num = mysqli_num_rows($result);
 
                // Nếu có kết quả thì hiển thị, ngược lại thì thông báo không tìm thấy kết quả
                if ($num > 0 && $search != "") 
                {
                    // Dùng $num để đếm số dòng trả về.
                    echo "$num ket qua tra ve"; 
 
                    // Vòng lặp while & mysql_fetch_assoc dùng để lấy toàn bộ dữ liệu có trong table và trả về dữ liệu ở dạng array. ?>
		<table border="1" width="92%">
		<tr style="background:#7f827b; height: 50px; text-align: center; font-weight: bold;">
			<td width="8%">Mã Sản Phẩm</td>
			<td width="13%">Tên sản phẩm</td>
			<td>Ảnh minh họa</td>
			<td width="8%">Thể Loại</td>
			<td width="13%">Giá Tiền</td>
			<td width="8%">Số Lượng</td>
			<td width="15%">Mô tả</td>
			<td width="8%">Hiển Thị</td>
			<td width="8%">Sửa</td>
			<td width="7%">Xóa</td>
		</tr>
                <?php    while ($row = mysqli_fetch_assoc($result)) { ?>
		<tr>
			<td style="font-weight: bold; text-align: center;"><?php echo $row['ID_SanPham'];?></td>
			<td style="font-weight: bold; text-align: center;"><?php echo $row['TenSanPham'];?></td>
			<td><img src="view/template/image/<?php echo $row['Hinh'];?>" width="120px" height="100px" style="border: 1px solid #7f827b; border-radius:10px;"></td>
			<td style="font-weight: bold; text-align: center;"><?php echo $row['TenTheLoai'];?></td>
			<td style="text-align: center;"><?php echo number_format($row['GiaTien']);?> đồng</td>
			<td style="font-weight: bold; text-align: center;"><?php echo $row['SoLuong'];?></td>
			<td style="text-align: center;"><?php echo $row['MoTa'];?></td>
			<td style="font-weight: bold; text-align: center;"><?php echo $row['HienThi'];?></td>
			<td style="padding-left:5px;"><a href="index.php?page=product&action=update&id=<?php echo $row['ID_SanPham'];?>"><img src="view/template/image/suaicon.jpg" width="50px" height="40px" style="border-radius:10px;"></a></td>
			<td><a href="index.php?page=product&action=delete&id=<?php echo $row['ID_SanPham'];?>" onClick="return confirm('Bạn có chắc chắn muốn xóa?');"><img src="view/template/image/xoaicon.png" width="60px" height="50px"></a></td>
		</tr>						
                   <?php } 

                } 

            }
        } ?>
																	   
		</table>															   
			
	<?php	
				include('view/introduce.php');
			
			?>
		</div>
		<div id="footer">
			<?php include("template/footer.php");?>
		</div>
	</div>
<?php } ?>	
</body>
</html>