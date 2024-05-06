<?php 
session_start();

// Xử lý yêu cầu xóa sản phẩm
if(isset($_POST['delete'])){
    $masp_to_delete = $_POST['delete'];
    foreach($_SESSION['cart'] as $key => $product){
        if($product[0] == $masp_to_delete){
            unset($_SESSION['cart'][$key]);
            break;
        }
    }
}

if(isset($_POST['update'])){
    foreach($_POST['quantity'] as $masp_to_update => $new_quantity){
        foreach($_SESSION['cart'] as &$product){
            if($product[0] == $masp_to_update){
                $product[4] = $new_quantity;
                break;
            }
        }
    }
}

// Redirect trở lại trang giỏ hàng sau khi xóa hoặc cập nhật
header('Location: shopping_cart.php');
exit();


?>