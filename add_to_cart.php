<?php
    session_start();
    if (isset($_SESSION['id'])) {
        $id = $_SESSION['id'];
        $id_product = $_GET['id'];
        $color = $_GET['color'];
        $size = $_GET['size'];
        $quantity = $_GET['quantity'];
        $date = date('Y-m-d H:i:s');
        require_once './admin/root/connect.php';
        $sql = "
            INSERT INTO `cart` (`id`, `id_customer`, `id_product`, `color`, `size`, `quantity`, `date`)
            VALUES (NULL, '$id', '$id_product', '$color', '$size', '$quantity', '$date')
        ";
        mysqli_query($connect, $sql);
        header('location: ./cart.php');
    } else {
        header('location: ./index.php');
    }
?>