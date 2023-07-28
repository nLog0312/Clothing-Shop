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
    <link rel="stylesheet" href="./CSS/styleProfile.css">
</head>
<body>
    <div id="main">
            <?php
                include_once './admin/root/func.php';
                include_once './admin/root/connect.php';
                include_once './Header.php';
                
                $id = $_GET['id'];
                $name; $price; $description; $type;
                $color = array(); $size = array(); $image = array();

                $sql = "SELECT * FROM `customers` WHERE customers.id = $id";
                $result = mysqli_query($connect, $sql);
                if (mysqli_num_rows($result) > 0) {
                    foreach ($result as $index => $each) {
                        echo '
                        <div id="body">
                            <div class="row justify-content-center">
                                <div class="col-md-7">
                                    <div class="profile-head">
                                        <h5>
                                            ' . $each['fullname'] . '
                                        </h5>
                                        <h6>
                                            ' . $each['phone'] . '
                                        </h6>
                                        <ul class="nav nav-tabs" id="myTab">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Thông tin cá nhân</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Setting</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-7">
                                    <div class="tab-content profile-tab" id="myTabContent">
                                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Họ và tên</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>' . $each['fullname'] . '</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Số điện thoại</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>' . $each['phone'] . '</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Email</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>' . $each['email'] . '</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Địa chỉ nhận hàng</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>' . $each['deliveryaddress'] . '</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>';
                    }
                }
            ?>
        <?php
            include_once './Footer.php';
        ?>
    </div>

    <?php
        include_once './JS/handleDetailProduct.php';
    ?>
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

        // nav tabs
        var myTab = document.getElementById('myTab');
        var tabItem = myTab.querySelectorAll('.nav-link');

        tabItem.forEach(function(item) {
            item.addEventListener('click', function() {
                tabItem.forEach(function(item) {
                    item.classList.remove('active');
                })
                this.classList.add('active');
            })
        })
	</script>
</body>
</html>