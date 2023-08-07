<?php
  $idProduct = addslashes($_GET['id']);
  $idDetail = addslashes($_GET['idDetail']);
  $colorProduct = addslashes($_POST['colorProduct']);
  $sizeProduct = addslashes($_POST['sizeProduct']);
  $quantityProduct = addslashes($_POST['quantityProduct']);

  // Upload file image product
  $imgProduct = $_FILES['imgProduct'];
  $target_dir = "photos/";
  $file_extension = explode(".", $imgProduct["name"])[1];
  $file_name = time() . '.' . $file_extension;
  $target_file = $target_dir . $file_name;
  move_uploaded_file($imgProduct["tmp_name"], $target_file);

  require_once '../root/connect.php';
  if (isset($_FILES['imgProduct']) && $_FILES['imgProduct']['size'] > 0) {
    $sqlUpdateProductDetail = "
      UPDATE `product_detail`
      SET `color`='$colorProduct',`size`='$sizeProduct',`image`='$file_name', `quantity`='$quantityProduct'
      WHERE `id`='$idDetail'
    ";
  } else {
    $sqlUpdateProductDetail = "
      UPDATE `product_detail`
      SET `color`='$colorProduct',`size`='$sizeProduct', `quantity`='$quantityProduct'
      WHERE `id`='$idDetail'
    ";
  }

  mysqli_query($connect, $sqlUpdateProductDetail);
  mysqli_close($connect);

  header("Location: ../ProductsManage/detail_product.php?id=$idProduct");
?>