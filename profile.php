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

    <!-- Github tỉnh huyện xã -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>

	<link rel="stylesheet" href="./CSS/style.css">
    <link rel="stylesheet" href="./CSS/styleProfile.css">
</head>
<body>
    <div class="toast-container position-fixed p-3" style="top: 100px; right: 50px;">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">Thông Báo</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <?php
                    if (isset($_SESSION['toast'])) {
                        echo $_SESSION['toast'];
                        unset($_SESSION['toast']);

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
    <div id="main">
        <?php
            include_once './admin/root/func.php';
            include_once './admin/root/connect.php';
            include_once './Header.php';
            if (!isset($_SESSION['phone'])) {
                header('Location: index.php');
            }
            
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
                                            <a class="nav-link active" id="home-tab" href="#" role="tab" aria-controls="home" aria-selected="true">Thông tin cá nhân</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="profile-tab" href="#" role="tab" aria-controls="profile" aria-selected="false">Sửa thông tin cá nhân</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="changepwd-tab" href="#" role="tab" aria-controls="changepwd" aria-selected="false">Đổi mật khẩu</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-md-7">
                                <div class="tab-content profile-tab" id="myTabContent">
                                    <div class="ms-3 mb-5 mt-2 tab-pane fade show active" id="tab-home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Họ và tên</label>
                                            </div>
                                            <div class="col-md-8">
                                                <p>' . $each['fullname'] . '</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Số điện thoại</label>
                                            </div>
                                            <div class="col-md-8">
                                                <p>' . $each['phone'] . '</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-8">
                                                <p>' . $each['email'] . '</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Ngày sinh</label>
                                            </div>
                                            <div class="col-md-8">
                                                <p>' . $each['dateofbirth'] . '</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Địa chỉ</label>
                                            </div>
                                            <div class="col-md-8">
                                                <p>' . $each['wards'] . ' - ' . $each['district'] . ' - ' . $each['conscious'] . '</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Địa chỉ nhận hàng</label>
                                            </div>
                                            <div class="col-md-8">
                                                <p>' . $each['deliveryaddress'] . '</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="ms-3 mb-5 mt-2 tab-pane fade" id="tab-profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <form action="updateCustomer.php?type=changeInfo&id='. $id .'" method="POST">
                                            <div class="row mb-3">
                                                <div class="d-flex align-items-center col-md-5">
                                                    <label>Họ và tên</label>
                                                </div>
                                                <div class="col-md-7">
                                                    <input type="text" name="fullname" class="form-control" value="' . $each['fullname'] . '">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="d-flex align-items-center col-md-5">
                                                    <label>Số điện thoại</label>
                                                </div>
                                                <div class="col-md-7">
                                                    <input disabled type="text" name="phone" class="form-control" value="' . $each['phone'] . '">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="d-flex align-items-center col-md-5">
                                                    <label>Email</label>
                                                </div>
                                                <div class="col-md-7">
                                                    <input disabled type="text" name="email" class="form-control" value="' . $each['email'] . '">
                                                </div>
                                            </div>
                                            <div class="row mb-3"">
                                                <div class="d-flex align-items-center col-md-5">
                                                    <label>Tỉnh/Thành phố</label>
                                                </div>
                                                <div class="col-md-7">
                                                    <select name="conscious" class="form-select form-select-sm mb-3" id="city" aria-label=".form-select-sm">';
                                                        if ($each['conscious'] != '') {
                                                            echo '<option value="' . $each['conscious'] . '" selected>' . $each['conscious'] . '</option>';
                                                        } else {
                                                            echo '<option value="" selected>Chọn tỉnh thành</option>';
                                                        }
                                                echo '</select>
                                                </div>
                                            </div>
                                            <div class="row mb-3"">
                                                <div class="d-flex align-items-center col-md-5">
                                                    <label>Quận/Huyện</label>
                                                </div>
                                                <div class="col-md-7">
                                                    <select name="district" class="form-select form-select-sm mb-3" id="district" aria-label=".form-select-sm">';
                                                        if ($each['district'] != '') {
                                                            echo '<option value="' . $each['district'] . '" selected>' . $each['district'] . '</option>';
                                                        } else {
                                                            echo '<option value="" selected>Chọn quận huyện</option>';
                                                        }
                                                echo '</select>
                                                </div>
                                            </div>
                                            <div class="row mb-3"">
                                                <div class="d-flex align-items-center col-md-5">
                                                    <label>Phường/Xã</label>
                                                </div>
                                                <div class="col-md-7">
                                                    <select name="wards" class="form-select form-select-sm" id="ward" aria-label=".form-select-sm">';
                                                        if ($each['wards'] != '') {
                                                            echo '<option value="' . $each['wards'] . '" selected>' . $each['wards'] . '</option>';
                                                        } else {
                                                            echo '<option value="" selected>Chọn phường xã</option>';
                                                        }
                                                echo '</select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="d-flex align-items-center col-md-5">
                                                    <label>Ngày Sinh</label>
                                                </div>
                                                <div class="col-md-7">
                                                    <input onkeyup="onChangeDob()" type="date" name="dateofbirth" class="form-control" value="' . $each['dateofbirth'] . '">
                                                    <label class="error-dob" style="color: red"></label>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="d-flex align-items-center col-md-5">
                                                    <label>Địa chỉ nhận hàng</label>
                                                </div>
                                                <div class="col-md-7">
                                                    <input type="text" name="deliveryaddress" class="form-control" value="' . $each['deliveryaddress'] . '">
                                                </div>
                                            </div>
                                            <div class="row mt-3 mb-3 justify-content-end">
                                                <div class="col-md-2">
                                                    <input type="submit" name="submit" class="btn btn-primary" value="Cập nhật">
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="ms-3 mb-5 mt-2 tab-pane fade" id="tab-changepwd" role="tabpanel" aria-labelledby="changepwd-tab">
                                        <form action="updateCustomer.php?type=changePwd&id='. $id .'" method="POST">
                                            <div class="row mb-3">
                                                <div class="d-flex align-items-center col-md-5">
                                                    <label>Mật khẩu cũ</label>
                                                </div>
                                                <div class="col-md-7">
                                                    <input type="password" name="oldpassword" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="d-flex align-items-center col-md-5">
                                                    <label>Mật khẩu mới</label>
                                                </div>
                                                <div class="col-md-7">
                                                    <input type="password" name="newpassword" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="d-flex align-items-center col-md-5">
                                                    <label>Nhập lại mật khẩu mới</label>
                                                </div>
                                                <div class="col-md-7">
                                                    <input onkeyup="checkRepassword()" type="password" name="renewpassword" class="form-control">
                                                    <label class="error-repassword" style="color: red"></label>
                                                </div>
                                            </div>
                                            <div class="row mt-3 mb-3 justify-content-end">
                                                <div class="col-md-2">
                                                    <input type="submit" name="submit" class="btn btn-primary" value="Cập nhật">
                                                </div>
                                            </div>
                                        </form>
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
        var tabHome = document.querySelector('#tab-home');
        var tabProfile = document.querySelector('#tab-profile');
        var tabChangePwd = document.querySelector('#tab-changepwd');

        tabItem.forEach(function(item) {
            item.addEventListener('click', function() {
                tabItem.forEach(function(item) {
                    item.classList.remove('active');
                })
                
                if (this.getAttribute('aria-controls') == 'home') {
                    tabHome.classList.add('show', 'active');
                    tabProfile.classList.remove('show', 'active');
                    tabChangePwd.classList.remove('show', 'active');
                }
                else if (this.getAttribute('aria-controls') == 'profile') {
                    tabHome.classList.remove('show', 'active');
                    tabProfile.classList.add('show', 'active');
                    tabChangePwd.classList.remove('show', 'active');
                }
                else {
                    tabHome.classList.remove('show', 'active');
                    tabProfile.classList.remove('show', 'active');
                    tabChangePwd.classList.add('show', 'active');
                }
                this.classList.add('active');
            })
        })

        // Render  city-district-ward
        var citis = document.getElementById("city");
        var districts = document.getElementById("district");
        var wards = document.getElementById("ward");
        var Parameter = {
            url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
            method: "GET",
            responseType: "application/json",
        };
        var promise = axios(Parameter);
        promise.then(function (result) {
            renderCity(result.data);
        });

        function renderCity(data) {
            for (const x of data) {
                citis.options[citis.options.length] = new Option(x.Name, x.Name);
            }
            citis.onchange = function () {
                district.length = 1;
                ward.length = 1;
                if(this.value != ""){
                const result = data.filter(n => n.Name === this.value);

                for (const k of result[0].Districts) {
                    district.options[district.options.length] = new Option(k.Name, k.Name);
                }
                }
            };
            district.onchange = function () {
                ward.length = 1;
                const dataCity = data.filter((n) => n.Name === citis.value);
                if (this.value != "") {
                const dataWards = dataCity[0].Districts.filter(n => n.Name === this.value)[0].Wards;

                for (const w of dataWards) {
                    wards.options[wards.options.length] = new Option(w.Name, w.Name);
                }
                }
            };
        }

        // Change Date of birth
        function onChangeDob() {
            var dob = document.querySelector('input[type="date"]');
            var dobValue = new Date(dob.value);
            var today = new Date();
            var age = today.getFullYear() - dobValue.getFullYear();
            if (age < 18) {
                document.querySelector('.error-dob').innerHTML = 'Bạn chưa đủ 18 tuổi';
                document.querySelector('input[name="dateofbirth"]').style.borderColor = 'red';
                document.querySelector('#tab-profile input[type="submit"]').disabled = true;
            } else {
                document.querySelector('.error-dob').innerHTML = '';
                document.querySelector('input[name="dateofbirth"]').style.borderColor = '#ced4da';
                document.querySelector('#tab-profile input[type="submit"]').disabled = false;
            }
        }

        // Check repassword
        function checkRepassword() {
            var password = document.querySelector('input[name="newpassword"]').value;
            var repassword = document.querySelector('input[name="renewpassword"]').value;
            if (password != repassword) {
                document.querySelector('.error-repassword').innerHTML = 'Mật khẩu không khớp';
                document.querySelector('input[name="renewpassword"]').style.borderColor = 'red';
                document.querySelector('#tab-changepwd input[type="submit"]').disabled = true;
            } else {
                document.querySelector('.error-repassword').innerHTML = '';
                document.querySelector('input[name="renewpassword"]').style.borderColor = '#ced4da';
                document.querySelector('#tab-changepwd input[type="submit"]').disabled = false;
            }
        }
	</script>
</body>
</html>