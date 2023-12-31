<div id="header">
    <nav class="navbar navbar-expand-sm">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="./index.php">
                    <img src="./admin/menu/IMG/logo.png" alt="">
                    Clothing Shop
                </a>
            </div>

            <?php
                $type = "";
                if (isset($_GET['type'])) {
                    $type = $_GET['type'];
                }
            ?>

            <div class="collapse navbar-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item trousers">
                        <a class="nav-link" href="index.php?type=quan">| Quần</a>
                    </li>
                    <li class="nav-item shirt">
                        <a class="nav-link" href="index.php?type=ao">Áo</a>
                    </li>
                </ul>
            </div>
            <?php
                if (isset($_COOKIE['remember'])) {
                    $token = $_COOKIE['remember'];
                    require_once './admin/root/connect.php';
                    $sql = "
                        SELECT * FROM `customers`
                        WHERE `customers`.`token` = '$token'
                    ";
                    $result = mysqli_query($connect, $sql);
                    $number_rows = mysqli_num_rows($result);
                    
                    if ($number_rows == 1) {
                        $row = mysqli_fetch_array($result);
                        $_SESSION['id'] = $row['id'];
                        $_SESSION['phone'] = $row['phone'];
                    }
                }

                
                if (empty($_SESSION['id'])) {
                    echo '
                        <div class="navbar-right">
                            <ul class="navbar-nav">
                                <li class="nav-item sign-in">
                                    <a class="nav-link" href="javascript:;">Đăng Nhập</a>
                                </li>
                                <li class="nav-item sign-up">
                                    <a class="nav-link" style="margin-right: 20px;" href="javascript:;">Đăng Ký</a>
                                </li>
                            </ul>
                        </div>
                    ';
                } elseif ($_SESSION['phone'] != "admin") {
                    if (isset($_SESSION['fullname']) && $_SESSION['fullname'] != "") {
                        echo '
                            <div class="dropdown">
                                <button style="margin-bottom: 0;" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                '.$_SESSION['fullname'].'
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a class="dropdown-item" href="./profile.php?id='. $_SESSION['id'] .'">Thông tin cá nhân</a></li>
                                    <li><a class="dropdown-item mt-1" href="./view_cart.php">Giỏ Hàng</a></li>
                                    <li><a class="dropdown-item mt-1" href="./logout.php">Đăng xuất</a></li>
                                </ul>
                            </div>
                        ';
                    } else {
                        echo '
                            <div class="dropdown">
                                <button style="margin-bottom: 0;" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                '.$_SESSION['phone'].'
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                <li><a class="dropdown-item" href="./profile.php?id='. $_SESSION['id'] .'">Thông tin cá nhân</a></li>
                                    <li><a class="dropdown-item mt-1" href="./view_cart.php">Giỏ Hàng</a></li>
                                    <li><a class="dropdown-item mt-1" href="./logout.php">Đăng xuất</a></li>
                                </ul>
                            </div>
                        ';
                    }
                } else {
                    header('location: ./admin/root/index.php');
                }
            ?>
            
        </div>
    </nav>
</div>