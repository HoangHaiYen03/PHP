//Luồng 2: Khi người dùng ấn lưu vào giỏ hàng thì lấy thông tin lưu vào session để hiển thị

// Chỉnh sửa

<?php
session_start();
if(isset($_POST['dathang']))
{
  //Lấy giá trị
  $Tensp = $_POST['Tensp'];
  $Gia = $_POST['Gia'];
  $Hinhanh = $_POST['Hinhanh'];
  $Masp = $_POST['Masp'];

  //Tạo mảng con
  $sp = array ($Masp,$Hinhanh,$Tensp,$Gia);
  // add vào giỏ hàng
  // $_SESSION['cart'][] = $sp;
  //hoặc
  array_push($_SESSION['cart'],$sp);
  header('location: viewcart.php');
  
}
?>