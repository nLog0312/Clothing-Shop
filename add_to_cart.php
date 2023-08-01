<?php
    session_start();
    if (empty($_SESSION['phone'])) {
        $_SESSION['login'] = "Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng";
        header('location: ./index.php');
    } else {
        $id = $_GET['id'];
        $color = $_GET['color'];
        $size = $_GET['size'];
    
        if (empty($_SESSION['cart'][$id])) {
            require_once './admin/root/connect.php';
            $sql = "
                SELECT * FROM products
                INNER JOIN product_detail
                ON products.id = product_detail.id_product
                WHERE products.id = $id
            ";
            $result = mysqli_query($connect, $sql);
            $product = mysqli_fetch_array($result);
            $_SESSION['cart'][$id] = array(
                'id' => $product['id'],
                'name' => $product['name'],
                'price' => $product['price'],
                'color' => $color,
                'size' => $size,
                'image' => $product['image'],
                'quantity' => 1
            );
        } else {
            $_SESSION['cart'][$id]['quantity'] += 1;
        }
    
        $_SESSION['toast-product-detail'] = 'Đã thêm sản phẩm vào giỏ hàng';
        header('location: ./Product.php?id=' . $id . '');
    }
?>