<?php
$id = $_GET['id'];

require_once '../root/connect.php';
$sqlDeleteDetail = "
  DELETE FROM `product_detail` WHERE `product_detail`.`id_product` = $id
";

$sqlDeleteProduct = "
  DELETE FROM `products` WHERE `id` = $id
";

mysqli_query($connect, $sqlDeleteDetail);
mysqli_query($connect, $sqlDeleteProduct);
mysqli_close($connect);

header("Location: ../ProductsManage/");