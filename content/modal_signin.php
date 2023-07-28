<div id="signin" class="modal">
    <form class="modal-content animate" action="signin.php" method="post">
        <div class="imgcontainer">
            <span onclick="document.getElementById('signin').style.display='none'" class="close" title="Close Modal">&times;</span>
        </div>

        <div class="container-main">
            <div class="container-top">
                <label for="unameoremail"><b>Tài Khoản hoặc Email</b></label>
                <input class="form-control" type="text" placeholder="Tài khoản..." name="unameoremail" required>

                <label for="psw"><b>Mật Khẩu</b></label>
                <div class="input-group mb-3">
                    <input class="form-control" type="password" placeholder="Mật khẩu..." name="psw" required>
                    <button onclick="togglePwdSignIn()" class="btn btn-outline-secondary" type="button" id="button-addon2">
                        <ion-icon name="eye-outline" style="cursor: pointer"></ion-icon>
                        <ion-icon hidden name="eye-off-outline" style="cursor: pointer"></ion-icon>
                    </button>
                </div>
                <?php
                    if (isset($_SESSION['error'])) {
                        echo '<label style="color: red;" for="error">' . $_SESSION['error'] . '</label>';
                        unset($_SESSION['error']);

                        echo '<script>document.getElementById("signin").style.display="block"</script>';
                    }
                ?>
            </div>
            
            <div class="container-bottom">
                <button class="gray" type="submit">Đăng Nhập</button>
                <label>
                    <input type="checkbox" name="remember"> Ghi nhớ đăng nhập
                </label>
            </div>
        </div>

        <div class="container-cancel" style="background-color:#f1f1f1">
            <button type="button" onclick="document.getElementById('signin').style.display='none'" class="cancelbtn">Huỷ</button>
            <span class="psw"><a href="#">Quên mật khẩu?</a></span>
        </div>
    </form>
</div>