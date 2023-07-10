<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>

	<style>
		.navbar-header img {
			height: 50px;
			mix-blend-mode: multiply;
			filter: contrast(1);
		}
		#footer {
			min-height: 50px;
			padding: 3px;
			background-color: #e7e7e7;
			color: black;
			display: flex;
			flex-direction: column;
			align-items: center;
			font-family: Segoe UI Emoji,Segoe UI Symbol,Segoe UI,Helvetica Neue,Helvetica,Arial,sans-serif;
		}

		.contact img {
			width: 30px;
			height: 30px;
		}
	</style>
</head>
<body>
	<div id="main">
		<div id="header">
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<div class="navbar-header">
						<img src="./admin/menu/IMG/logo.png" alt="">
						<a class="navbar-brand" href="#">Clothing Shop</a>
					</div>
					
					<div class="navbar-right">
						<ul class="nav navbar-nav">
							<li><a href="login.php">Đăng Nhập</a></li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
		<div id="body"></div>
		<div id="footer">
			<p>Author: nLog0312 &#10084;</p>
			<div class="contact">
				<a href="https://www.facebook.com/nlog0312/"><img src="https://img.icons8.com/fluent/48/000000/facebook-new.png"/></a>
				<a href="https://www.instagram.com/nlog0312/"><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png"/></a>
			</div>
		</div>
	</div>
</body>
</html>