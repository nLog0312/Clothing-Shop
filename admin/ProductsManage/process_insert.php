<?php

$nameProduct = addslashes($_POST['nameProduct']);
$priceProduct = addslashes($_POST['priceProduct']);
$typeProduct = addslashes($_POST['typeProduct']);
$descriptProduct = addslashes($_POST['descriptProduct']);

// Upload file image product
// $imgProduct = $_FILES['imgProduct'];
// $target_dir = "photos/";
// $file_extension = explode(".", $imgProduct["name"])[1];
// $target_file = $target_dir . time() . '.' . $file_extension;
// move_uploaded_file($imgProduct["tmp_name"], $target_file);

require_once '../root/connect.php';
$sqlAddProduct = "
  INSERT INTO `products`(`name`, `price`, `description`, `type`)
  VALUES ('$nameProduct','$priceProduct','$descriptProduct','$typeProduct')
";

mysqli_query($connect, $sqlAddProduct);
mysqli_close($connect);

header("Location: ../ProductsManage/");