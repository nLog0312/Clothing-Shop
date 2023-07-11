<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="./CSS/style.css">
</head>
<body>
	<div id="main">
		<div id="header">
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<div class="navbar-header">
						<img src="./admin/menu/IMG/logo.png" alt="">
						<a class="navbar-brand" href="./index.php">Clothing Shop</a>
					</div>

					<?php
						$type = "";
						if (isset($_GET['type'])) {
							$type = $_GET['type'];
						}
					?>

					<div class="navbar-left">
						<ul class="nav navbar-nav">
							<li class="trousers"><a href="index.php?type=quan">| Quần</a></li>
							<li class="shirt"><a href="index.php?type=ao">Áo</a></li>
						</ul>
					</div>
					
					<div class="navbar-right">
						<ul class="nav navbar-nav">
							<li class="sign-in"><a href="javascript:;">Đăng Nhập</a></li>
							<li class="sign-up"><a style="margin-right: 20px;" href="javascript:;">Đăng Ký</a></li>
						</ul>
					</div>
				</div>
			</nav>
		</div>

		<?php
			function product_price($priceFloat) {
				$symbol = ' vnđ';
				$symbol_thousand = '.';
				$decimal_place = 0;
				$price = number_format($priceFloat, $decimal_place, '', $symbol_thousand);
				return $price.$symbol;
			}

            include_once './content/home_products.php';
        ?>

		<div id="footer">
			<p>Author: nLog0312 &#10084;</p>
			<div class="contact">
				<a href="https://www.facebook.com/nlog0312/" target="_blank"><img src="https://img.icons8.com/fluent/48/000000/facebook-new.png"/></a>
				<a href="https://www.instagram.com/nlog0312/" target="_blank"><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png"/></a>
			</div>
		</div>
	</div>

    <script>
        const sign_in = document.querySelector(".sign-in");
        const sign_up = document.querySelector(".sign-up");
        sign_in.addEventListener("click", function(e){
            document.querySelector("#signin").style.display = "block";
        });
		sign_up.addEventListener("click", function(e){
			document.querySelector("#signup").style.display = "block";
		});
        // Get the modal
        var moda_signin = document.getElementById('signin');
		var modal_signup = document.getElementById('signup');
        
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
        if (event.target == modal_signin || event.target == modal_signup) {
            modal.style.display = "none";
        }
        }
    </script>
</body>
</html>