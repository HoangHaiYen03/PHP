<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chi tiết sản phẩm</title>
  <link rel="stylesheet" href="../../css/styles.css">
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
            <div class="col-md-6 col-lg-3 product-container">
    
               <div class="product-image">
                    <img src="../../images/<?php echo $row['HinhAnh'] ?>" alt="">
               </div>
    <!-- Thông tin -->
            <div class="product-info">
                <form action="themspvaogio.php" method ="post">
                
                <h1 class ="h1"><?php echo $row['TenSP'] ?></h1>
                <p class ="p"> Giá: <?php echo number_format($row['Gia'], 0, ".", ".")?>đ</p>
                <p class="p">Mô tả: <?php echo $row['MoTa'] ?></p>
                <p class="p">Số lượng: <?php echo $row['SoLuong'] ?></p>

                <input type="hidden" name="Tensp" value="<?= $row['TenSP'] ?>">
                <input type="hidden" name="Gia" value = "<?= $row['Gia'] ?>"> 
                <input type="hidden" name="Hinhanh" value="<?= $row['HinhAnh'] ?>">
                <input type="hidden" name="Masp" value="<?= $row['MaSanPham'] ?>">
                <input type="submit" name="dathang" value="Đặt hàng">
                </form>
                </div>
        </div>
    </div>
</body>
</html>
<?php



 
