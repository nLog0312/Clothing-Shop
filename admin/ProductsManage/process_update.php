<?php
$id = addslashes($_GET['id']);
$nameProduct = addslashes($_POST['nameProduct']);
$priceProduct = addslashes($_POST['priceProduct']);
$typeProduct = addslashes($_POST['typeProduct']);
$descriptProduct = addslashes($_POST['descriptProduct']);

require_once '../root/connect.php';
$sqlUpdateProduct = "
  UPDATE `products`
  SET `name`='$nameProduct',`price`='$priceProduct',`description`='$descriptProduct',`type`='$typeProduct'
  WHERE `id`='$id'
";

mysqli_query($connect, $sqlUpdateProduct);
mysqli_close($connect);

header("Location: ../ProductsManage/");