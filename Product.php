<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clothing Shop</title>
    
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
	
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
                                <div class="zoom product-img border border-dark-subtle rounded">
                                    <img class="img-father img-thumbnail" src="./admin/ProductsManage/photos/<?php echo $image[0]?>" alt="">
                                    <img id="imgZoom" class="img-father img-thumbnail" src="./admin/ProductsManage/photos/<?php echo $image[0]?>" alt="">
                                </div>
                                <div class="product-img--bottom">
                                    <div class="prevImg"><ion-icon name="chevron-back-outline"></ion-icon></div>
                                    <div class="list-img">
                                        <?php
                                            foreach ($image as $index => $value) {
                                                echo "
                                                    <div class='img'>
                                                        <input class='img-soon rounded' type='image' src='./admin/ProductsManage/photos/$value' alt=''>
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
                                <div class="product-show-header text-start">
                                    <h2><?php echo $name?></h2>
                                    <h3><?php echo product_price($price)?></h3>
                                </div>
                                <div class="product-show-body mt-5 text-start">
                                    <h3>Mô tả sản phẩm</h3>
                                    <hr>
                                    <p><?php echo $description?></p>
                                    <hr>
                                    <h3>Thông tin sản phẩm</h3>
                                    <hr>
                                </div>
                                <hr>
                                <div class="product-show-footer mt-5 text-start">
                                    <div class="footer-left">
                                        <div class="footer-left--color">
                                            <h4 class="fs-5">Màu sắc</h4>
                                            <div class="color">
                                                <?php
                                                    foreach ($color as $index => $value) {
                                                        echo "
                                                            <div class='color-item fs-6'>
                                                                <input style='display: none;' type='radio' name='color' id='color-$index' value='$value'>
                                                                <label for='color-$index' style='background-color: $value'></label>
                                                            </div>
                                                        ";
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="footer-left--size mt-5">
                                            <h4 class="fs-5">Kích thước</h4>
                                            <div class="size">
                                                <?php
                                                    foreach ($size as $index => $value) {
                                                        echo "
                                                            <div class='size-item fs-6'>
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
                                        <button class="bg-cart"><ion-icon name="cart-outline"></ion-icon>Thêm vào giỏ hàng</button>
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
	<script>
		window.onscroll = function() {sCrollHeader()};
        window.onload = function() {sCrollHeader()};

		function sCrollHeader() {
			if (document.documentElement.scrollTop > 50) {
				document.getElementById("header").style.backgroundColor = "#e7e7e7";
			}
			else  {
				document.getElementById("header").style.backgroundColor = "transparent";
			}
		}

        let btnAddCart = document.querySelector('.footer-right button');
        <?php
            if (isset($_SESSION['phone'])) {
                echo "
                    btnAddCart.addEventListener('click', function() {
                        let color = document.querySelector('input[name=color]:checked').value;
                        let size = document.querySelector('input[name=size]:checked').value;
                        let id = $id;
                        let phone = '".$_SESSION['phone']."';
                        let data = {
                            color: color,
                            size: size,
                            id: id,
                            phone: phone
                        }
                        let url = './admin/root/addCart.php';
                        fetch(url, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify(data)
                        })
                        .then(response => response.text())
                        .then(data => {
                            if (data == 'success') {
                                alert('Thêm vào giỏ hàng thành công');
                            } else {
                                alert('Thêm vào giỏ hàng thất bại');
                            }
                        })
                    })
                ";
            } else {
                $_SESSION['login'] = "Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng";
                echo "
                    btnAddCart.addEventListener('click', function() {
                        window.location.href = './index.php';
                    })
                ";
            }
        ?>
	</script>
</body>
</html>