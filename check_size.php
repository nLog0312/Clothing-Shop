<?php
    $size = $_GET['size'];

    require_once './admin/root/connect.php';
    $sqlCheckSize = "
        SELECT color FROM `product_detail` WHERE `size` = '$size'
    ";
    $result = mysqli_query($connect, $sqlCheckSize);
    $color = "";
    foreach ($result as $value) {
        $color = $color . ",". $value['color'];
    }
    
    echo $color;
?>