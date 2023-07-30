<?php
	session_start();
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
</head>
<body>
	<div id="main">
		<div class="toast-container position-fixed p-3" style="top: 80px; right: 50px;">
			<div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
				<div class="toast-header">
					<strong class="me-auto">Thông Báo</strong>
					<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
				</div>
				<div class="toast-body">
					<?php
						if (isset($_SESSION['toast-index'])) {
							echo $_SESSION['toast-index'];
							unset($_SESSION['toast-index']);

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
		<?php
			include_once './admin/root/func.php';
			include_once './Header.php';

            include_once './content/home_products.php';
			include_once './Footer.php';
			include_once './JS/handle_modal.php'
        ?>
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