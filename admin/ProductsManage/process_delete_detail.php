<?php

$idProduct = $_GET['id'];
$idDetail = $_GET['idDetail'];

require_once '../root/connect.php';
$sqlDeleteProductDetail = "
  DELETE FROM `product_detail`
  WHERE `id`='$idDetail'
";

mysqli_query($connect, $sqlDeleteProductDetail);
mysqli_close($connect);

header("Location: ../ProductsManage/detail_product.php?id=$idProduct");