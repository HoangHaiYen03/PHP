<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
    <div class="container">
        <div class = "row">
            <?php include "../../connection.php";
            if(isset($_GET['Masanpham'])) 
            {
                $Masp = $_GET['Masanpham'];
                // Nếu có thì sẽ tiến hành hiện form thông tin sản phẩm
                $select_product = mysqli_query($connect,"SELECT * FROM sanpham where MaSanPham = '$Masp'");
                $row = mysqli_fetch_assoc($select_product);
            }
            ?>
            <div class="col-md-6 col-lg-3" style = "padding: 20px 20px; border-radius: 20px">
                <form action="themspvaogiohang.php" method ="post">
                <img style="width:200px" >
                <p><?php echo $row['TenSP'] ?></p>
                <p>Giá: <?php echo number_format($row['Gia'], 0, ".", ".")?>đ</p>
                <img src="../../images/<?php echo $row['HinhAnh'] ?>" alt="">
                <p><?php echo $row['MoTa'] ?></p>
                <input type="hidden" name="Tensp" value="$row['Tensp']">
                <input type="hidden" name="Gia" value = "$row['Gia']"> 
                <input type="hidden" name="Hinhanh" value="$row['Hinhanh']">
                <input type="hidden" name="Masp" value="$row['Masp']">
                <input type="submit" name="dathang" value="Đặt hàng">
                </form>
                </div>
        </div>
    </div>
</body>
</html>
<?php
//Luồng 1: Nguoi dung ấn vào sản phẩm thì lấy mã sản phẩm gửi sang trang chi tiết sau đó truy vấn trong bảng sản phẩm để hiển thị giao diện ra
// nhận mã sp từ form
// $Masp = $_POST['Masanpham']; 
// SELECT * FROM sanpham WHERE masp = $Masp;


 
