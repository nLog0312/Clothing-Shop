<?php
    session_start();
    if (empty($_SESSION['phone'])) {
        $_SESSION['login'] = "Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng";
        header('location: ./index.php');
    } else {
        if (empty($_SESSION['cart'])) {
            $_SESSION['toast-index'] = 'Giỏ hàng của bạn đang trống';
            header('location: ./index.php');
        } else {
            require_once './admin/root/connect.php';

            $sql = "SELECT * FROM customers WHERE phone = '" . $_SESSION['phone'] . "'";
            mysqli_query($connect, $sql);
            $result = mysqli_query($connect, $sql);
            $customer = mysqli_fetch_array($result);
            
            if (empty($customer['deliveryaddress'])) {
                $_SESSION['toast'] = 'Bạn cần cập nhật địa chỉ giao hàng để đặt hàng';
                header('location: ./profile.php?id='. $_SESSION['id'] .'');
            } else {
                $_SESSION['toast'] = 'Đơn hàng sẽ được giao trong 3-5 ngày';
                unset($_SESSION['cart']);
                header('location: ./view_cart.php');
            }
        }
    }
?>