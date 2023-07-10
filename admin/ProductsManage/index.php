<?php include_once '../menu/menu_content-header.php';?>

	<link rel="stylesheet" href="../ProductsManage/CSS/style.css">
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
						<th style="width:4%">STT</th>
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

	<?php include_once '../ProductsManage/Modal/modal_delete.php';?>

	<script type="text/javascript" src="../menu/JS/handle.js"></script>
	<script>
		navLinks.forEach(element => {
			if (element.querySelector(".bx").classList.contains("bx-package")) {
				element.classList.add("active");
			}
		});

		<?php include_once '../ProductsManage/JS/JSmodal_delete.php';?>
	</script>

<?php include_once '../menu/menu_content-footer.php';?>