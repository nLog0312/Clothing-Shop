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