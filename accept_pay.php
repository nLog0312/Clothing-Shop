<?php
    session_start();
    if (empty($_SESSION['phone'])) {
        $_SESSION['login'] = "Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng";
        header('location: ./index.php');
    } else {
        $_SESSION['toast'] = 'Đơn hàng sẽ được giao trong 3-5 ngày';
        unset($_SESSION['cart']);
        header('location: ./view_cart.php');
    }
?>