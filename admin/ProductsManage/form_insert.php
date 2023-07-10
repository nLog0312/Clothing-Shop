<?php include_once '../menu/menu_content-header.php';?>

    <link rel="stylesheet" href="CSS/styleInsertProduct.css">
    <section class="addNewItem">
        <div class="text">Thêm Sản Phẩm Mới</div>
        <div class="content">
            <form action="process_insert.php" method="post">
                <div>
                    <label for="nameProduct">1. Nhập tên sản phẩm: </label>
                    <br>
                    <input type="text" name="nameProduct" placeholder="Tên...">
                    <label class="validate nameProduct"></label>
                    <br>

                    <label for="priceProduct">2. Nhập giá sản phẩm: </label>
                    <br>
                    <input type="number" name="priceProduct" min="0" placeholder="0">
                    <label class="validate priceProduct"></label>
                    <br>


                    <label for="typeProduct">3. Kiểu dáng sản phẩm: </label>
                    <br>
                    <input type="text" name="typeProduct" placeholder="Kiểu dáng...">
                    <label class="validate typeProduct"></label>
                </div>

                <div>
                    <label for="descriptProduct">4. Mô tả sản phẩm: </label>
                    <br>
                    <textarea name="descriptProduct" placeholder="Mô tả..."></textarea>
                    <label class="validate descriptProduct"></label>
                </div>

                <input type="submit" value="Thêm mới">
            </form>
            <button>
                <a href="index.php">Quay lại</a>
            </button>
        </div>
    </section>

    <script type="text/javascript" src="../menu/JS/handle.js"></script>

    <script>
        let lstInputs = document.querySelectorAll('.addNewItem input');
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