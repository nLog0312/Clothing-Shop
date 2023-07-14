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
		include_once '../root/func.php';
        $id = $_GET['id'];
        $sqlGetProduct = "
            SELECT * FROM `products`
			WHERE `products`.`id` = '$id'
        ";
        $sqlGetProductDetail = "
            SELECT * FROM `product_detail`
			WHERE `product_detail`.`id_product` = '$id'
        ";

    ?>
	<div class="modal open">
		<div class="modal-container">
			<div class="modal-header">
				<div class="modal-title">Thông tin chi tiết sản phẩm</div>
				<div class="modal-close">
					<i class="bx bx-x"></i>
				</div>
			</div>

			<div class="modal-body">
				<div class="modal-content">
					<?php
						$result = mysqli_query($connect, $sqlGetProduct);
						foreach ($result as $value) {
							$name = $value['name'];
							$price = $value['price'];
							$description = $value['description'];
							$type = $value['type'];
						}
					?>


					<div class="modal-content-info-name">
						<label>Tên Sản Phẩm: </label>
						<?php echo $name;?>
					</div>
					<div class="modal-content-info-price">
						<label>Giá Sản Phẩm: </label>
						<?php
							echo product_price($price);
						?>
					</div>
					<div class="modal-content-info-type">
						<label>Loại: </label>
						<?php echo $type;?>
					</div>

					<label>Danh mục sản phẩm: </label>
					<div class="modal-content-info-list" id="managerTable">
						<table border="1">
							<tr>
								<th>Ảnh</th>
								<th>Size</th>
								<th>Màu Sắc</th>
								<th colspan="2"></th>
							</tr>
							<?php
								$result = mysqli_query($connect, $sqlGetProductDetail);
								foreach ($result as $value) {
									$idDetail = $value['id'];
									$color = $value['color'];
									$size = $value['size'];
									$image = $value['image'];

									echo "<tr>";
									echo "<td>
										<object data='photos/$image' type='image/png'>
											<img src='../menu/IMG/logo.png' alt='$name'>
										</object>
									</td>";
									echo "<td>$size</td>";
									echo "<td>$color</td>";
									echo "<td>
										<a href='../ProductsManage/update_detail_product.php?idDetail=$idDetail'>Sửa</a>
										</td>";
									echo "<td>
										<a href='../ProductsManage/process_delete_detail.php?id=$id&idDetail=$idDetail'>Xoá</a>
									</td>";
									echo "</tr>";
								}
							?>
						</table>
					</div>
					


					<div class="modal-content-info-description">
						<label>Mô tả sản phẩm: </label>
						<br>
						<?php echo "<p>$description</p>";?>
					</div>
				</div>

				<div class="modal-footer">
					<button>
						<a href="add_detail_product.php?id=<?php echo "$id";?>">Thêm chi tiết sản phẩm</a>
					</button>
				</div>
			</div>
		</div>
	</div>

	<script>
		<?php include_once '../ProductsManage/JS/JSmodal_product--detail.php';?>
	</script>
<?php include_once '../menu/menu_content-footer.php';?>