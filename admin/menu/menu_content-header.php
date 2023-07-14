<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Giao Diện Admin</title>

	<!-- CSS -->
	<link rel="stylesheet" href="../menu/CSS/style.css">

	<!-- Boxicons CSS -->
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>
<body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="../menu/IMG/logo.png" alt="">
                </span>

                <div class="text header-text">
                    <span class="name">Clothing Shop</span>
                    <span class="profession">Buôn bán quần áo</span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">
                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="../Dashboard/index.php">
                            <i class='bx bx-home-alt icon' ></i>
                            <span class="text nav-text">Bảng điều khiển</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="../ProductsManage/index.php">
                            <i class='bx bx-package icon' ></i>
                            <span class="text nav-text">Quản lý sản phẩm</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="../">
                        <i class='bx bx-exit icon' ></i>
                        <span class="text nav-text">Đăng xuất</span>
                    </a>
                </li>

                <li class="mode">
                    <div class="moon-sun">
                        <i class='bx bx-moon icon moon' ></i>
                        <i class='bx bx-sun icon sun' ></i>
                    </div>
                    <span class="mode-text text">Dark Mode</span>

                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>
            </div>
        </div>
    </nav>
    
