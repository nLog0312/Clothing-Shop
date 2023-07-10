<?php

$idProduct = addslashes($_GET['id']);
$colorProduct = addslashes($_POST['colorProduct']);
$sizeProduct = addslashes($_POST['sizeProduct']);

// Upload file image product
$imgProduct = $_FILES['imgProduct'];
$target_dir = "photos/";
$file_extension = explode(".", $imgProduct["name"])[1];
$file_name = time() . '.' . $file_extension;
$target_file = $target_dir . $file_name;
move_uploaded_file($imgProduct["tmp_name"], $target_file);

require_once '../root/connect.php';
$sqlAddProductDetail = "
  INSERT INTO `product_detail`(`color`, `size`, `image`, `id_product`)
  VALUES ('$colorProduct','$sizeProduct','$file_name','$idProduct')
";

mysqli_query($connect, $sqlAddProductDetail);
mysqli_close($connect);

header("Location: ../ProductsManage/detail_product.php?id=$idProduct");