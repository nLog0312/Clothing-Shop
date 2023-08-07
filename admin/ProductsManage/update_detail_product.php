<?php include_once '../menu/menu_content-header.php';?>

	<link rel="stylesheet" href="../ProductsManage/CSS/style.css">
	<link rel="stylesheet" href="../ProductsManage/CSS/styleDetailProduct.css">
	<section class="information">
		<div class="text">Quản Lý Sản Phẩm</div>
		<div class="content">
			<div class="content-header">
				<div class="btn">
					<a href="form_insert.php" class="btn btn-insert">Thêm sản phẩm mới</a>
				</div>

				<?php
					$search = "";
					if (isset($_GET['search'])) {
						$search = $_GET['search'];
					}
				?>

				<form action="" class="search">
					<input type="text" name="search" id="" placeholder="Tìm kiếm" value="<?php echo $search?>">
				</form>
			</div>

			<div class="content-body">
				<table border="1">
					<tr>
						<th style="width:4%">Mã</th>
						<th style="width:27%">Tên</th>
						<th style="width:27%">Giá</th>
						<th style="width:27%">Kiểu</th>
						<th style="width:15%" colspan="3">Thao Tác</th>
					</tr>
					
					<?php include_once '../ProductsManage/showProducts.php';?>
				</table>
			</div>
		</div>
	</section>

    <?php
        $idDetail = $_GET['idDetail'];

		$sqlGetProductDetail = "
			SELECT * FROM `product_detail` WHERE `id` = '$idDetail'
        ";

		$result = mysqli_query($connect, $sqlGetProductDetail);
		foreach ($result as $value) {
			$idProduct = $value['id_product'];
			$size = $value['size'];
			$color = $value['color'];
			$quantity = $value['quantity'];
		}
    ?>
	<link rel="stylesheet" href="CSS/styleInsertProductDetail.css">
	<div class="modal open">
	<div class="modal-container--detailProduct">
			<div class="modal-header">
				<div class="modal-title">Nhập chi tiết sản phẩm</div>
				<div class="modal-close">
					<a href="../ProductsManage/detail_product.php?id=<?php echo "$idProduct";?>">
						<i class="bx bx-x"></i>
					</a>
				</div>
			</div>

			<div class="modal-body--detailProduct">
				<form action="process_update_detail.php?id=<?php echo "$idProduct";?>&idDetail=<?php echo "$idDetail";?>" method="post" enctype="multipart/form-data">
					<label for="colorProduct">1. Nhập màu sắc sản phẩm: </label>
					<br>
					<input type="text" name="colorProduct" value="<?php echo $color?>">
					<label class="validate colorProduct"></label>
					<br>
					<label for="colorProduct">2. Nhập số lượg sản phẩm: </label>
					<br>
					<input type="number" name="quantityProduct" value="<?php echo $quantity?>">
					<label class="validate quantityProduct"></label>
					<br>

					<label for="sizeProduct">3. Nhập kích thước sản phẩm: </label>
					<br>
					<select id="sizeProduct" name="sizeProduct">
						<option value="S" <?php if ($size == "S") echo "selected"?>>S</option>
						<option value="M" <?php if ($size == "M") echo "selected"?>>M</option>
						<option value="L" <?php if ($size == "L") echo "selected"?>>L</option>
						<option value="XL" <?php if ($size == "XL") echo "selected"?>>XL</option>
						<option value="XXL" <?php if ($size == "XXL") echo "selected"?>>XXL</option>
					</select>
					<br>

					<label for="imgProduct">3. Upload ảnh sản phẩm: </label>
					<br>
					<input type="file" name="imgProduct" accept="image/png, image/jpeg">
					<label class="validate imgProduct"></label>

					<button class="btnDetail">Sửa</button>
				</form>
				<button>
					<a href="../ProductsManage/detail_product.php?id=<?php echo "$idProduct";?>">Quay lại</a>
				</button>
			</div>
		</div>
	</div>

	<script>
		function checkValidate() {
			if (inputImg.files.length == 0 || check == false) {
				document.querySelector('.modal-body--detailProduct input[type="submit"]').disabled = true;
			} else {
				document.querySelector('.modal-body--detailProduct input[type="submit"]').disabled = false;
			}
		}
		let check = false;
		let inputDetail = document.querySelector('.modal-body--detailProduct input[name="colorProduct"]');
		let inputImg = document.querySelector('.modal-body--detailProduct input[type="file"]');
        inputDetail.addEventListener('blur', function() {
			let value = this.value;
			let name = this.name;
			let label = document.querySelector(`.validate.${name}`);
			if (value == '') {
				label.innerHTML = 'Vui lòng nhập màu sắc sản phẩm';
			} else {
				label.innerHTML = '';
				check = true;
			}
			checkValidate();
		})

		inputImg.addEventListener('change', function() {
			if (inputImg.files.length == 0) {
				label.innerHTML = '';
			}
			checkValidate();
		})

		checkValidate();
	</script>
<?php include_once '../menu/menu_content-footer.php';?>