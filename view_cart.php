<?php
    session_start();
    if (empty($_SESSION['phone'])) {
        $_SESSION['login'] = "Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng";
        header('location: ./index.php');
    }
    require_once './admin/root/func.php';
    $totalPrice = 0;
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
    <link rel="stylesheet" href="./CSS/styleProfile.css">
</head>
<body>
    <div class="toast-container position-fixed p-3" style="top: 100px; right: 50px;">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">Thông Báo</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <?php
                    if (isset($_SESSION['toast'])) {
                        echo $_SESSION['toast'];
                        unset($_SESSION['toast']);

                        echo '<script>
                                var toastLiveExample = document.getElementById("liveToast")
                                var toast = new bootstrap.Toast(toastLiveExample)
                                toast.show()
                            </script>';
                    }
                ?>
            </div>
        </div>
    </div>
    <div id="main">
        <?php
            include_once './admin/root/func.php';
            include_once './admin/root/connect.php';
            include_once './Header.php';
            if (!isset($_SESSION['phone'])) {
                header('Location: index.php');
                exit();
            }
            
        ?>
        <div id="body">
            <?php
                if (isset($_SESSION['cart'])) {
                    $cart = $_SESSION['cart'];
            ?>
            <section class="h-100">
                <div class="container py-5">
                    <div class="row d-flex justify-content-center my-4">
                        <div class="col-md-8">
                            <div class="card mb-4">
                                <div class="card-header py-3">
                                    <h5 class="mb-0">Giỏ Hàng - <?php echo count($cart)?> sản phẩm</h5>
                                </div>
                                <div class="card-body">
                                    <!-- Single item -->
                            <?php
                                foreach ($cart as $id => $each) {
                                    $totalPrice += $each['price'] * $each['quantity'];
                            ?>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                                            <!-- Image -->
                                            <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                                                <img src="./admin/ProductsManage/photos/<?php echo $each['image']?>" class="img-thumbnail w-100" style='max-height: 16.5rem;' alt="<?php echo $each['name']?>"/>
                                            </div>
                                            <!-- Image -->
                                        </div>

                                        <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                                            <!-- Data -->
                                            <p><strong><?php echo $each['name']?></strong></p>
                                            <p>Color: <?php echo $each['color']?></p>
                                            <p>Size: <?php echo $each['size']?></p>
                                            <button type="button" class="btn btn-primary btn-sm me-1 mb-2" data-mdb-toggle="tooltip" title="Remove item">
                                                <a style="color: white;" href="delete_product.php?id= <?php echo $each['id']?>">
                                                    <ion-icon style="margin: auto;" name="trash-outline"></ion-icon>
                                                </a>
                                            </button>
                                            <button type="button" class="btn btn-danger btn-sm mb-2" data-mdb-toggle="tooltip" title="Move to the wish list">
                                                <ion-icon style="margin: auto;" name="heart-circle-outline"></ion-icon>
                                            </button>
                                            <!-- Data -->
                                        </div>

                                        <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                                            <!-- Quantity -->
                                            <div class="d-flex align-items-center mb-4" style="max-width: 300px">
                                                <button class="btn btn-primary" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                    <ion-icon style="margin: auto;" name="remove-outline"></ion-icon>
                                                </button>

                                                <div class="ms-1 me-1 form-outline">
                                                    <input id="form1" min="0" name="quantity" value="<?php echo $each['quantity']?>" type="number" class="form-control" />
                                                </div>

                                                <button class="btn btn-primary" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                    <ion-icon style="margin: auto;" name="add-outline"></ion-icon>
                                                </button>
                                            </div>
                                            <!-- Quantity -->

                                            <!-- Price -->
                                            <p class="text-start text-md-center">
                                            <strong>
                                                <?php echo product_price($each['price'] * $each['quantity'])?>
                                            </strong>
                                            </p>
                                            <!-- Price -->
                                        </div>
                                    </div>
                                    <!-- Single item -->

                                    <hr class="my-4" />
                                <?php
                                    }
                                ?>
                                </div>
                            </div>
                        </div>
                        <div class="card col-md-4 mb-4">
                            <div class="card-header py-3">
                                <h5 class="mb-0">Chi Tiết Thanh Toán</h5>
                            </div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                    Tổng tiền hàng
                                    <span>
                                        <?php echo product_price($totalPrice)?>
                                    </span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                    Vận chuyển
                                    <span>FreeShip</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                    <strong>Tổng tiền thanh toán</strong>
                                    <span><strong>
                                        <?php echo product_price($totalPrice)?>
                                    </strong></span>
                                </li>
                                </ul>

                                <button type="button" class="btn btn-primary btn-lg btn-block">
                                    <a href="accept_pay.php" style="color: white; font-size: large;">Giao Hàng</a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php
                } else {
                    echo '
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card mb-4">
                                        <div class="card-header py-3">
                                            <h5 class="mb-0">Giỏ Hàng</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h3 class="text-center">Giỏ hàng trống</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    ';
                }
            ?>
        </div>
        <?php include_once './Footer.php';?>
    </div>
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

        
	</script>
</body>
</html>