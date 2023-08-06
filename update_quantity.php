<?php
    session_start();
    require_once './admin/root/func.php';
    $quantity = $_GET['quantity'];
    $price = $_GET['price'];

    $_SESSION['cart'][$_GET['id']]['quantity'] = $quantity;

    echo product_price($quantity * $price);
?>