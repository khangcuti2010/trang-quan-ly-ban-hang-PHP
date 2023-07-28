<div>
	<h2 style="text-align: center; color: red; margin-bottom: 20px;">Danh sách sản phẩm</h2>
	<h3 style="text-align: center;">Thêm sản phẩm</h3>
	<a href="index.php?page=product&action=insert" style="margin-left: 420px;"><img src="view/template/image/themicon.png" width="70px" height="60px" style="border-radius:10px;"></a>
	<h4>
		<div align="center">
            <form action="index.php" method="get">
                Search: <input type="text" name="txsearch" size="40px" />
                <input type="submit" name="btsearch" value="search" />
            </form>
		</div>
	</h4>
	<h5>
		<tr>
			<div align="center">
				<form action="index.php" method="get">	
					<td style="font-weight: bold"><label>Thể loại</label></td>
					<td style="padding: 7px 7px;"><select name="category" style="height: 30px;">
					<option value="0">------Thể loại-----</option>
					<?php 
					$_SESSION['category'] = $product->getListCategory();	
					foreach ($_SESSION['category'] as $value) { ?>
					<option value="<?php echo $value['ID_TheLoai'];?>">
					<?php echo $value['ID_TheLoai']." - ".$value['TenTheLoai'];?>
					</option>
				<?php } ?>
			</select></td>
					<input type="submit" name="btsearch1" value="search" />
				</form>	
			</div>	
		</tr>	
	</h5>
	<table border="1" width="92%">
		<tr style="background:#7f827b; height: 50px; text-align: center; font-weight: bold;">
			<td width="8%">Mã Sản Phẩm</td>
			<td width="13%">Tên sản phẩm</td>
			<td>Ảnh minh họa</td>
			<td width="8%">Thể Loại</td>
			<td width="13%">Giá Tiền</td>
			<td width="8%">Số Lượng</td>
			<td>Mô tả</td>
			<td width="8%">Sửa</td>
			<td width="7%">Xóa</td>
		</tr>
		<?php
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
 
                    // Vòng lặp while & mysql_fetch_assoc dùng để lấy toàn bộ dữ liệu có trong table và trả về dữ liệu ở dạng array.
                    while ($row = mysqli_fetch_assoc($result)) { ?>
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
                else {
                    echo "Khong tim thay ket qua!";
                }
            }
        }
       
		 else{
			 foreach ($_SESSION['listPage1'] as $value) { ?>
		<tr>
			<td style="font-weight: bold; text-align: center;"><?php echo $value['ID_SanPham'];?></td>
			<td style="font-weight: bold; text-align: center;"><?php echo $value['TenSanPham'];?></td>
			<td><img src="view/template/image/<?php echo $value['Hinh'];?>" width="120px" height="100px" style="border: 1px solid #7f827b; border-radius:10px;"></td>
			<td style="font-weight: bold; text-align: center;"><?php echo $value['TenTheLoai'];?></td>
			<td style="text-align: center;"><?php echo number_format($value['GiaTien']);?> đồng</td>
			<td style="font-weight: bold; text-align: center;"><?php echo $value['SoLuong'];?></td>
			<td style="text-align: center;"><?php echo $value['MoTa'];?></td>		
			<td style="padding-left:5px;"><a href="index.php?page=product&action=update&id=<?php echo $value['ID_SanPham'];?>"><img src="view/template/image/suaicon.jpg" width="50px" height="40px" style="border-radius:10px;"></a></td>
			<td><a href="index.php?page=product&action=delete&id=<?php echo $value['ID_SanPham'];?>" onClick="return confirm('Bạn có chắc chắn muốn xóa?');"><img src="view/template/image/xoaicon.png" width="60px" height="50px"></a></td>
		</tr>
		<?php }
				  }
		?>
	</table>
	<div style="padding-left: 400px; padding-top: 20px;">
	<?php 
	if (isset($_SESSION['totalPage1'])) {
		for($i = 1; $i <= $_SESSION['totalPage1']; $i++){ ?>
		<p class="page"><a href="index.php?page=product&p=<?php echo $i;?>"><?php echo $i;?></a></p>
	<?php }} ?>
</div>