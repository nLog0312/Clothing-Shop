<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clothing Shop</title>
    
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	
    <!-- Icon -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

	<link rel="stylesheet" href="./CSS/style.css">
    <link rel="stylesheet" href="./CSS/styleDetail.css">
</head>
<body>
    <div id="main">
        <?php
            include_once './admin/root/func.php';
            include_once './admin/root/connect.php';
            include_once './Header.php';
            
            $id = $_GET['id'];
            $name; $price; $description; $type;
            $color = array(); $size = array(); $image = array();

            $sql = "
                SELECT products.*, product_detail.color, product_detail.size, product_detail.image
                FROM `products` INNER JOIN product_detail ON product_detail.id_product = products.id
                WHERE products.id = $id
            ";
            $result = mysqli_query($connect, $sql);
            if (mysqli_num_rows($result) > 0) {
                foreach ($result as $index => $each) {
                    $name = $each['name'];
                    $price = $each['price'];
                    $description = $each['description'];
                    $type = $each['type'];
                    array_push($color, $each['color']);
                    array_push($size, $each['size']);
                    array_push($image, $each['image']);
                }
            }
        ?>
        <div id="body">
            <div class="body-detail">
                <h1>Chi Tiết Sản Phẩm</h1>
                <div class="container text-center">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="all-img_product">
                                <div class="product-img">
                                    <img class="img-father img-rounded" src="./admin/ProductsManage/photos/<?php echo $image[0]?>" alt="">
                                </div>
                                <div class="product-img--bottom">
                                    <div class="prevImg"><ion-icon name="chevron-back-outline"></ion-icon></div>
                                    <div class="list-img">
                                        <?php
                                            foreach ($image as $index => $value) {
                                                echo "
                                                    <div class='img'>
                                                        <input class='img-soon img-rounded' type='image' src='./admin/ProductsManage/photos/$value' alt=''>
                                                    </div>
                                                ";
                                            }
                                        ?>
                                    </div>
                                    <div class="nextImg"><ion-icon name="chevron-forward-outline"></ion-icon></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="product-show">
                                <div class="product-show-header text-left">
                                    <h2><?php echo $name?></h2>
                                    <h3><?php echo product_price($price)?></h3>
                                </div>
                                <div class="product-show-body text-left">
                                    <h3>Mô tả sản phẩm</h3>
                                    <hr>
                                    <p><?php echo $description?></p>
                                    <hr>
                                    <h3>Thông tin sản phẩm</h3>
                                    <hr>
                                </div>
                                <div class="product-show-footer text-left">
                                    <div class="footer-left">
                                        <div class="footer-left--color">
                                            <h4>Màu sắc</h4>
                                            <div class="color">
                                                <?php
                                                    foreach ($color as $index => $value) {
                                                        echo "
                                                            <div class='color-item'>
                                                                <input style='display: none;' type='radio' name='color' id='color-$index' value='$value'>
                                                                <label for='color-$index' style='background-color: $value'></label>
                                                            </div>
                                                        ";
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="footer-left--size">
                                            <h4>Kích thước</h4>
                                            <div class="size">
                                                <?php
                                                    foreach ($size as $index => $value) {
                                                        echo "
                                                            <div class='size-item'>
                                                                <input type='radio' name='size' id='size-$index' value='$value'>
                                                                <label for='size-$index'>$value</label>
                                                            </div>
                                                        ";
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="footer-right">
                                        <button class="btn bg-cart"><ion-icon name="cart-outline"></ion-icon>Thêm vào giỏ hàng</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php

            include_once './Footer.php';
            include_once './content/modal_signin.php';
            include_once './content/modal_signup.php';
            include_once './JS/handle_modal.php'
        ?>
    </div>

    <?php
        include_once './JS/handleDetailProduct.php';
    ?>
</body>
</html>