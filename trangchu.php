<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/styles.css">
</head>
<body>
    
<div class = "headline"><h2>Trang sản phẩm</h2></div>
    <div class ="cart">
        <a href="./pages/shopping_cart.php"><i class="fa-solid fa-cart-shopping"></i>Giỏ hàng</a>
    </div>
    <div class="container">
        <div class="row">
            <?php
            include "connection.php";
            $sql = "SELECT * FROM sanpham";
            $result = mysqli_query($connect, $sql);
            while($row = mysqli_fetch_assoc($result)){
            ?>
                <div class="col-md-3 col-sm-6">
                    <div class="product-grid">
                        <div class="product-image">
                            <a href="#" class="image">
                                <img class="img-1" src="images/<?php echo $row['HinhAnh'] ?>">
                                <img class="img-2" src="images/<?php echo $row['HinhAnh'] ?>">
                            </a>
                            <ul class="product-links">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-random"></i></a></li>
                                <li>
                                    <a href="pages/chitietsp/themspvaogio.php?Masanpham=<?php echo $row['MaSanPham']?>&TenSP=<?php echo $row['TenSP']?>&HinhAnh=<?php echo $row['HinhAnh']?>&Mota=<?php echo $row['MoTa']?>&Gia=<?php echo $row['Gia']?>&Soluong=<?php echo 1?>&Maloai=<?php echo $row['Maloai']?>">
                                    <i class="fa fa-shopping-cart"></i>
                                    </a>
                                </li>
                            </ul>
                            <a href="#" class="product-view"><i class="fa fa-search"></i></a>
                        </div>
                        <div class="product-content">
                            <ul class="rating">
                                <li class="fas fa-star"></li>
                                <li class="fas fa-star"></li>
                                <li class="fas fa-star"></li>
                                <li class="fas fa-star"></li>
                                <li class="fas fa-star"></li>
                                <li class="disable">(50 reviews)</li>
                            </ul>
                            <h3 class="title"><a href="./pages/chitietsp/chitietsp.php?Masanpham=<?php echo $row['MaSanPham'] ?>"> <?php echo $row['TenSP']?></a></h3>
                            <div class="price"> <?php echo number_format($row['Gia'], 0, ".", ".")?>đ</div>
                            
                        </div>
                    </div>
            </div>
<?php } ?>

        </div>
    </div class="container">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>