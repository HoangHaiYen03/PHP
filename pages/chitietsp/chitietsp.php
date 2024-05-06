<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chi tiết sản phẩm</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
    </header>
    <div class="container">
    <h2 class="h2">Chi tiết sản phẩm</h2>
        <div class = "card">
        <div class="card-body">
            <?php include "../../connection.php";
            if(isset($_GET['Masanpham'])) 
            {
                $Masp = $_GET['Masanpham'];
                // Nếu có thì sẽ tiến hành hiện form thông tin sản phẩm
                $select_product = mysqli_query($connect,"SELECT * FROM sanpham where MaSanPham = '$Masp'");
                $row = mysqli_fetch_assoc($select_product);
            }
            ?>
            <div class="row">

            <div class="col-md-6 col-lg-3 product-container">
    
               <div class="product-image img">
                    <img src="../../images/<?php echo $row['HinhAnh'] ?>" alt="">
               </div>
    <!-- Thông tin -->
            <div class="product-info">
                <form action="themspvaogio.php" method ="post">
                
                <h1 class ="h1"><?php echo $row['TenSP'] ?></h1>
                <p class ="p"> Giá: <?php echo number_format($row['Gia'], 0, ".", ".")?>đ</p>
                <p class="p">Mô tả: <?php echo $row['MoTa'] ?></p>
                <p class="p">Số lượng: <?php echo $row['SoLuong'] ?></p>

                <input type="hidden" name="Tensp" value="<?=$row['TenSP']?>">
                <input type="hidden" name="Gia" value = "<?=$row['Gia']?>"> 
                <input type="hidden" name="Hinhanh" value="<?=$row['HinhAnh']?>">
                <input type="hidden" name="Masp" value="<?=$row['MaSanPham']?>">
                <input type="hidden" name="Soluong"value="<?=$row['SoLuong']?>">
                <input type="submit" name="dathang" value="Đặt hàng" class="large-button">
                </form>
                <h3 class="box-title mt-5">Điểm nổi bật chính</h3>
                    <ul class="list-unstyled">
                        <li><i class="fa fa-check text-success"></i>Chất liệu vải cao cấp</li>
                        <li><i class="fa fa-check text-success"></i>Phù hợp xu hướng thời trang</li>
                        <li><i class="fa fa-check text-success"></i>Đáp ứng tiêu chuẩn cao cấp</li>
                    </ul>
                </div>
            
            </div>
        </div>
        <h2 class="h2">Thông tin chi tiết sản phẩm</h2>
        <div class="col-lg-12 col-md-12 col-sm-12">
                    
                    <div class="table-responsive">
                        <table class="table table-striped table-product">
                            <tbody>
                                <tr>
                                    <td class ="td" width="10000">Thương hiệu</td>
                                    <td class ="td">Update</td>
                                </tr>
                                <tr>
                                    <td class ="td">Điều kiện giao hàng</td>
                                    <td class ="td">Update</td>
                                </tr>
                                <tr>
                                    <td class ="td">Phân loại sản phẩm</td>
                                    <td class ="td">Update</td>
                                </tr>
                                <tr>
                                    <td class ="td">Loại/Kiểu</td>
                                    <td class ="td">Update</td>
                                </tr>
                                
                                <tr>
                                    <td class ="td">Phong cách</td>
                                    <td class ="td">Update</td>
                                </tr>
                                <tr>
                                    <td class ="td">Phù hợp với</td>
                                    <td class ="td">Update</td>
                                </tr>
                                
                                <tr>
                                    <td class ="td">Số mô hình</td>
                                    <td class ="td">Update</td>
                                </tr>
                               
                                <tr>
                                    <td class ="td">Loại hoàn thiện</td>
                                    <td class ="td">Update</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
    
    </div>
    </div>
    <footer>
    </footer>
</body>
</html>
<?php
//Luồng 1: Nguoi dung ấn vào sản phẩm thì lấy mã sản phẩm gửi sang trang chi tiết sau đó truy vấn trong bảng sản phẩm để hiển thị giao diện ra
// nhận mã sp từ form
// $Masp = $_POST['Masanpham']; 
// SELECT * FROM sanpham WHERE masp = $Masp;


 
