<?php include_once '../menu/menu_content-header.php';?>

    <link rel="stylesheet" href="CSS/styleInsertProduct.css">
    <section class="updateItem">
        <div class="text">Chỉnh sửa sản phẩm</div>
        <?php
            $id = $_GET['id'];

            require_once '../root/connect.php';
            $sql = "SELECT * FROM products WHERE id = $id";
            $result = mysqli_query($connect, $sql);
            $row = mysqli_fetch_assoc($result);

            $name = $row['name'];
            $price = $row['price'];
            $type = $row['type'];
            $descript = $row['description'];
        ?>
        <div class="content">
            <form action="process_update.php?id=<?php echo $id?>" method="post">
                <div>
                    <label for="nameProduct">1. Nhập tên sản phẩm: </label>
                    <br>
                    <input type="text" name="nameProduct" value="<?php echo $name?>">
                    <label class="validate nameProduct"></label>
                    <br>

                    <label for="priceProduct">2. Nhập giá sản phẩm: </label>
                    <br>
                    <input type="number" name="priceProduct" min="0" value="<?php echo $price?>">
                    <label class="validate priceProduct"></label>
                    <br>


                    <label for="typeProduct">3. Kiểu dáng sản phẩm: </label>
                    <br>
                    <input type="text" name="typeProduct" value="<?php echo $type?>">
                    <label class="validate typeProduct"></label>
                </div>

                <div>
                    <label for="descriptProduct">4. Mô tả sản phẩm: </label>
                    <br>
                    <textarea name="descriptProduct"><?php echo $descript?></textarea>
                    <label class="validate descriptProduct"></label>
                </div>

                <input type="submit" value="Sửa sản phẩm">
            </form>
            <button>
                <a href="index.php">Quay lại</a>
            </button>
        </div>
    </section>

    <script type="text/javascript" src="../menu/JS/handle.js"></script>

    <script>
        let lstInputs = document.querySelectorAll('.updateItem input');
        lstInputs.forEach(input => {
            input.addEventListener('blur', function() {
                let value = this.value;
                let name = this.name;
                let label = document.querySelector(`.validate.${name}`);
                if (value == '') {
                    label.innerHTML = 'Vui lòng nhập thông tin';
                } else {
                    label.innerHTML = '';
                }
            })
        })
    </script>

<?php include_once '../menu/menu_content-footer.php';?>