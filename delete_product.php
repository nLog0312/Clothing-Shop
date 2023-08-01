<?php
    session_start();
    if (empty($_SESSION['phone'])) {
        $_SESSION['login'] = "Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng";
        header('location: ./index.php');
    } else {
        $id = $_GET['id'];
        
        $cart = $_SESSION['cart'];
        $cartV2 = array();
        foreach ($cart as $key => $value) {
            if ($value['id'] != $id) {
                array_push($cartV2, $value);
            }
        }
        unset($_SESSION['cart']);
        $_SESSION['cart'] = $cartV2;

        $_SESSION['toast'] = 'Đã xóa sản phẩm khỏi giỏ hàng';
        header('location: ./view_cart.php');
    }
?>