<div id="body">
    <div class="container d-flex justify-content-center mb-50">
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

            <div class="col-md-4 mt-2">
                <div class="card">
                    <div class="card-body">
                        <div class="card-img-actions">
                            <?php
                                echo "
                                <object style='position: absolute; left: 0; max-height: 350px;' class='card-img img-fluid' width='96' data='./admin/ProductsManage/photos/$image' type='image/png'>
                                    <img style='max-height: 350px;' src='./admin/menu/IMG/logo.png' class='card-img img-fluid' width='96' alt=''>
                                </object>";
                            ?>
                        </div>
                    </div>
                    <div class="card-body bg-light text-center">
                        <div class="mb-2">
                            <h6 class="font-weight-semibold mb-2">
                                <a href="#" class="text-default mb-2" data-abc="true"><?php echo $name;?></a>
                            </h6>
                        </div>
                        <h3 class="mb-0 font-weight-semibold"><?php echo product_price($price);?></h3>
                        
                        <button type="button" class="btn bg-cart"><i class="fa fa-cart-plus mr-2"></i>Thêm vào giỏ hàng</button>
                    </div>
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