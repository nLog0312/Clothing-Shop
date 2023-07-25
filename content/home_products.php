<div id="body">
    <div class="container d-flex mb-50">
        <div class="row">

        <?php
            require_once './admin/root/connect.php';

            $sql = "
                SELECT *FROM products
                WHERE type LIKE '%$type%'
            ";
            $result = mysqli_query($connect, $sql);
            if (mysqli_num_rows($result) > 0) {
                foreach ($result as $index => $value) {
                    $id = $value['id'];
                    $name = $value['name'];
                    $price = $value['price'];
                    $description = $value['description'];
                    $image = 'unknown.png';
                    $sqlGetImage = "
                        SELECT * FROM `product_detail`
                        WHERE `product_detail`.`id_product` = '$id'
                        LIMIT 1
                    ";
                    $resultImage = mysqli_query($connect, $sqlGetImage);
                    foreach ($resultImage as $valueImage) {
                        $image = $valueImage['image'];
                    }
        ?>

            <div class="card ms-3 mt-3" style="width: 18rem;">
                <?php
                    echo "
                    <object style='max-height: 16.5rem;' class='card-img-top card-img mt-1 border' data='./admin/ProductsManage/photos/$image' type='image/png'>
                        <img src='./admin/menu/IMG/logo.png' class='card-img-top card-img mt-1 border' alt=''>
                    </object>";
                ?>
                <div class="card-body">
                    <div class="mb-2">
                        <h6 class="font-weight-semibold mb-2">
                            <a href="./Product.php?id= <?php echo $id;?>" class="text-default mb-2"><?php echo $name;?></a>
                        </h6>
                    </div>
                    <h3 class="mb-0 font-weight-semibold"><?php echo product_price($price);?></h3>
                    <button type="button" class="bg-cart"><ion-icon name="cart-outline"></ion-icon>Thêm vào giỏ hàng</button>
                </div>
            </div>

        <?php
                }
            }
        ?>

        </div>
    </div>
    <?php
        include_once 'modal_signin.php';
        include_once 'modal_signup.php';
    ?>
</div>