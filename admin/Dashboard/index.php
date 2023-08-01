<?php
	session_start();
	if (!isset($_SESSION['phone']) || isset($_SESSION['phone']) != 'admin') {
		header("Location: ../../index.php");
	}
	include_once '../menu/menu_content-header.php';
?>

	<section class="information">
		<div class="text">Bảng Điều Khiển</div>
		<div class="content">
			<h6 style="font-size: 50px; margin-top: 100px; margin-left: 100px;">Không có ý tưởng làm trang dashboard nên thôi nhé =))))</h6>
		</div>
	</section>

	<script type="text/javascript" src="../menu/JS/handle.js"></script>
	<script>
		navLinks.forEach(element => {
			if (element.querySelector(".bx").classList.contains("bx-home-alt")) {
				element.classList.add("active");
			}
		});
	</script>
<?php include_once '../menu/menu_content-footer.php';?>
