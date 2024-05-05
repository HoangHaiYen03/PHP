<?php 
    session_start();
    include("../connection.php"); 
    if(isset($_POST['submit'])){
        $_SESSION['name'] = $_POST['name'];
        $name = $_POST['name'];
        $sdt = $_POST['sdt'];
        $address = $_POST['address'];
        $delivery = $_POST['delivery'];
        
        $query = "SELECT * FROM dondathang WHERE nguoidathang = '$name' and Chedo = 0";
        $result = mysqli_query($connect, $query);

        if(mysqli_num_rows($result) > 0){
            $row_giohang=$result->fetch_assoc();
            $sohoadon=$row_giohang["Sohoadon"];
        }else{
            $sqlInsert="INSERT INTO dondathang(Nguoidathang,Chedo,diachi,phuongthuc,SDT) values ('$name',0, '$address', '$delivery','$sdt')";
            if($connect->query($sqlInsert)===TRUE){
                $sql_giohang="SELECT * FROM dondathang WHERE Nguoidathang ='$name' and Chedo=0";
                $result_giohang=$connect->query($sql_giohang); 
                $row_giohang=$result_giohang->fetch_assoc();
                $sohoadon=$row_giohang["Sohoadon"]; 
            }
        }
        foreach($_SESSION['cart'] as $key => $products){
            $masp = $products[0];
            $hinhanh = $products[1];
            $tensp = $products[2];
            $gia = $products[3];
            $soluong = $products[4];
            $ktra = "SELECT * FROM `chitietdonhang` WHERE Sohoadon = '$sohoadon' and mahang = '$masp'";
            $result_ktra=$connect->query($ktra);
            if($result_ktra->num_rows > 0){

            }else{
                $sqlInsert="INSERT INTO chitietdonhang values('$sohoadon','$masp','$soluong','$gia')";
                $connect->query($sqlInsert);
            }    
        }
        header("location: order-detail.php");
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>shopping cart - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style type="text/css">
        .img-cart {
            display: block;
            max-width: 100px;
            height: auto;
            margin-left: auto;
            margin-right: auto;
        }
        table tr th{
            text-align: center;
        }
        table tr td {
            border: 1px solid #FFFFFF;
            text-align: center;
        }
        .table>tbody>tr>td{
            vertical-align: middle;
        }

        table tr th {
            background: #eee;
        }
        h3{
            font-weight: 600;
        }
        .panel-shadow {
            box-shadow: rgba(0, 0, 0, 0.3) 7px 7px 7px;
        }
        .info-form{
            padding: 10px;
            background: #f1f1f1;
            border-radius: 20px;
        }
        .info-form .delivery-wrapper{
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            background-color: #FFFFFF;
            border-radius: 10px;
        }
        .delivery-wrapper .method{
            display: flex;
            align-items: center;
        }
        .delivery-wrapper h4{
            margin-left: 10px;
            font-weight: 600;
        }
        .info-form .delivery label{
            font-size: 16px;
            padding: 0 10px;
            font-weight: 300;
        }
        .info-wrapper{
            display: block;
        }
        .info-wrapper .info-text{
            padding: 15px 10px;
            font-size: 16px;
            font-weight: bold;
        }
        .info-wrapper input{
            min-width: 48%;
            padding: 15px;
            border-radius: 10px;
            outline: none;
            border: 1px solid #e5e7eb;
        }
        .info-wrapper input:nth-child(3){
            margin-left: 38px;
        }
        .info-wrapper input:last-child{
            width: 100%;
            margin-top: 10px;
        }
        .mb{
            position: relative;
            top: 20px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    
    <div class="container bootstrap snippets bootdey">
        <div class="col-md-12 col-sm-8 content">
            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li><a href="../trangchu.php">Trang chủ</a></li>
                        <li class="active">Giỏ hàng</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-info panel-shadow">
                        
                        <div class="panel-heading">
                            <h3>
                                <!-- <img class="img-circle img-thumbnail" src="https://bootdey.com/img/Content/user_3.jpg"> -->
                                Giỏ hàng của bạn
                            </h3>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Sản phẩm</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Số lượng</th>
                                            <th>Giá</th>
                                            <th>Tổng tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <form action = "xulygiohang.php" method ="post">
                                            <?php
                                                $total_products = 0;
                                                $total_quantity = 0;
                                                $total_price = 0;
                                                if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){
                                                    foreach($_SESSION['cart'] as $key => $products){
                                                        $masp = $products[0];
                                                        $hinhanh = $products[1];
                                                        $tensp = $products[2];
                                                        $gia = $products[3];
                                                        $soluong = $products[4];
                                                // Tính tổng số sản phẩm
                                                $total_products++;

                                                // Tính tổng số lượng
                                                $total_quantity += $soluong;

                                                // Tính tổng tiền cho từng sản phẩm
                                                $product_total_price = $gia * $soluong;

                                                // Tính tổng tiền của toàn bộ đơn hàng
                                                $total_price += $product_total_price;
                                            ?>
                                            <tr>
                                                <td><img src="../images/<?= $hinhanh ?>" class="img-cart"></td>
                                                <td><strong><?= $tensp ?></strong></td>
                                                <td>
                                                    <div class="form-inline">
                                                        <input class="form-control" type="number" value="<?= $soluong ?>" min="1" name = "quantity">
                                                        <button type="submit" name="update" value="<?= $masp ?>" class="btn btn-default"><i class="fa fa-pencil"></i></button>
                                                        <button type="submit" name="delete" value="<?= $masp ?>" class="btn btn-primary"><i class="fa fa-trash-o"></i></button>
                                                    </div>
                                                </td>
                                                <td><?= number_format((int)$gia, 0, ".", ".") ?>đ</td>
                                                <td><?= number_format($product_total_price, 0, ".", ".") ?>đ</td>
                                            </tr>
                                            <?php
                                                }
                                            } else {
                                                // Hiển thị thông báo khi giỏ hàng trống
                                                echo '<tr><td colspan="5">Giỏ hàng trống</td></tr>';
                                            }
                                            ?>
                                            <tr>
                                                <td colspan="6" style="line-height: 0; background-color: #ccc; padding: 0.3px;">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="text-right">Tổng sản phẩm: </td>
                                                <td><?= $total_products ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="text-right">Tổng số lượng: </td>
                                                <td><?= $total_quantity ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="text-right"><strong>Tổng tiền: </strong></td>
                                                <td style="color: rgb(226, 16, 16); font-weight: bold;"><?= number_format($total_price, 0, ".", ".") ?>đ</td>
                                            </tr>
                                        </form>
                                       
                                    </tbody>
                                </table>
                                <form action="shopping_cart.php" class="info-form" method ="POST">
                                    <div class="delivery-wrapper">
                                        <div class="method"><i class="fa-solid fa-box" style="font-size: 20px;color: #428bca;"></i><h4>Chọn hình thức nhận hàng</h4></div>
                                        <div style="display: flex;">
                                            <div class="delivery">
                                                <label for="delivery1"><input type="radio" id="delivery1" name="delivery" value = "Nhận tại cửa hàng"> Nhận tại cửa hàng</label>
                                            </div>
                                            <div class="delivery">
                                                <label for="delivery2"><input type="radio" id="delivery2" name="delivery" value = "Giao hàng tại nhà" checked> Giao hàng tại nhà</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="info-wrapper">
                                        <div class="info-text">Thông tin người đặt</div>
                                        <input type="text" name = "name" placeholder="Nhập họ tên" required>
                                        <input type="text" name = "sdt" placeholder="Nhập số điện thoại" required>
                                        <input type="text" name = "address" placeholder="Nhập địa chỉ" required>
                                    </div>

                                    <a href="../trangchu.php" class="btn btn-success mb"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Tiếp tục mua hàng</a>
                                    <button name = "submit" class="btn btn-primary pull-right mb">Xác nhận đặt hàng<span class="glyphicon glyphicon-chevron-right"></span></button>
                                </form>
                                    
                                </div>
                            </div>
                        </div>
                        
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script type="text/javascript">

    </script>
</body>

</html>
