<?php
    $color = $_GET['color'];

    require_once './admin/root/connect.php';
    $sqlCheckColor = "
        SELECT size FROM `product_detail` WHERE `color` = '$color'
    ";
    $result = mysqli_query($connect, $sqlCheckColor);
    $size = "";
    foreach ($result as $value) {
        $size = $size . ",". $value['size'];
    }
    
    echo $size;
?>