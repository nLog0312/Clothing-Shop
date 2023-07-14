<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

	<link rel="stylesheet" href="./CSS/style.css">
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
            <div class="container text-center">
                <div class="col">
                    <h1>Chi Tiết Sản Phẩm</h1>
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
</body>
</html>