
<?php

session_start();
if(!isset($_SESSION['cart'])) {
  $_SESSION['cart'] = array();
}

// Hàm thêm sản phẩm vào giỏ hàng
function addToCart($Masp, $Tensp, $Gia, $Hinhanh, $Soluong) {
    $product_exists = false;
    foreach($_SESSION['cart'] as &$product) {
        if($product[0] == $Masp) {
            // Sản phẩm đã tồn tại, tăng số lượng lên 1
            $product[4] += 1;
            $product_exists = true;
            break;
        }
    }

    if(!$product_exists) {
        // Sản phẩm chưa tồn tại trong giỏ hàng, thêm vào biến session
        $sp = array($Masp, $Hinhanh, $Tensp, $Gia, $Soluong);
        $_SESSION['cart'][] = $sp;
    }
}

// Xử lý khi dữ liệu được gửi qua phương thức POST
if(isset($_POST['dathang'])) {
    // Lấy giá trị từ form
    $Tensp = $_POST['Tensp'];
    $Gia = $_POST['Gia'];
    $Hinhanh = $_POST['Hinhanh'];
    $Masp = $_POST['Masp'];
    $Soluong = 1;

    // Thêm sản phẩm vào giỏ hàng
    addToCart($Masp, $Tensp, $Gia, $Hinhanh, $Soluong);

    // Chuyển hướng đến trang giỏ hàng
    header('location: ../shopping_cart.php');
    exit();
}

// Xử lý khi dữ liệu được gửi qua phương thức GET
if(isset($_GET['Masanpham']) && isset($_GET['TenSP']) && isset($_GET['HinhAnh']) && isset($_GET['Gia']) && isset($_GET['Soluong'])) {
    // Lấy thông tin sản phẩm từ URL
    $Masp = $_GET['Masanpham'];
    $Tensp = $_GET['TenSP'];
    $Gia = $_GET['Gia'];
    $Hinhanh = $_GET['HinhAnh'];
    $Soluong = $_GET['Soluong'];

    // Thêm sản phẩm vào giỏ hàng
    addToCart($Masp, $Tensp, $Gia, $Hinhanh, $Soluong);

    // Chuyển hướng đến trang giỏ hàng
    header('location: ../shopping_cart.php');
    exit();
}
?>