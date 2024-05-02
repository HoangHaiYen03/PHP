<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <?php include("./connection.php");

            // Truy vấn Cơ sở dữ liệu để lấy danh sách sản phẩm
            $query = "SELECT * FROM sanpham";
            $result = mysqli_query($connection, $query);

            // Hiển thị sản phẩm
            while ($row = mysqli_fetch_array($result)) {
            ?>
                <div class="col-md-3 col-sm-6">
                    <div class="product-grid">
                        <div class="product-image">
                            <img src="<?= $row['HinhAnh']?>" title="<?= $row['TenSP'] ?>" />
                            <ul class="product-links">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-random"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                            <a href="#" class="product-view"><i class="fa fa-search"></i></a>
                        </div>
                        <div class="product-content">
                            <ul class="rating">
                                <li class="fa fa-star"></li>
                                <li class="fa fa-star"></li>
                                <li class="fa fa-star"></li>
                                <li class="fa fa-star"></li>
                                <li class="fa fa-star disable"></li>
                                <li class="disable">(1 reviews)</li>
                            </ul>
                            <h3 class="title"><a href="#"><?= $row['TenSP'] ?></a></h3>
                            <label>Giá: </label><span class="product-price"><?= number_format($row['Gia'], 0, ".", ",") ?> đ</span><br/>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>