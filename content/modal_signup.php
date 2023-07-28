<div id="signup" class="modal">
    <form class="modal-content animate" action="signup.php" method="post">
        <div class="imgcontainer">
            <span onclick="document.getElementById('signup').style.display='none'" class="close" title="Close Modal">&times;</span>
        </div>

        <div class="container-main">
            <div class="container-top">
                <label for="phone"><b>Số điện thoại</b></label>
                <input type="text" placeholder="Số điện thoại..." name="phone" required>
                <?php
                    if (isset($_SESSION['error'])) {
                        echo '<label style="color: red;" for="error">' . $_SESSION['error'] . '</label>';
                        unset($_SESSION['error']);

                        echo '<script>document.getElementById("signup").style.display="block"</script>';
                    }
                ?>


                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Email..." name="email" required>
                <label style="color: red;" for="error"></label>

                <label for="psw"><b>Mật khẩu</b></label>
                <div class="psw input-group mb-3">
                    <input class="form-control" type="password" placeholder="Mật khẩu..." name="psw" required>
                    <button onclick="togglePwdSignUp()" class="btn btn-outline-secondary" type="button" id="button-addon2">
                        <ion-icon name="eye-outline" style="cursor: pointer"></ion-icon>
                        <ion-icon hidden name="eye-off-outline" style="cursor: pointer"></ion-icon>
                    </button>
                </div>

                <label for="psw-repeat"><b>Nhập lại mật khẩu</b></label>
                <div class="psw-repeat input-group mb-3">
                    <input class="form-control" type="password" placeholder="Nhập lại mật khẩu..." name="psw-repeat" required>
                    <button onclick="togglePwd()" class="btn btn-outline-secondary" type="button" id="button-addon2">
                        <ion-icon name="eye-outline" style="cursor: pointer"></ion-icon>
                        <ion-icon hidden name="eye-off-outline" style="cursor: pointer"></ion-icon>
                    </button>
                </div>
                
                <label>
                    <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
                </label>

                <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>
            </div>
            
            <div class="container-bottom">
                <button disabled type="submit">Đăng Ký</button>
                <button type="button" onclick="document.getElementById('signup').style.display='none'" class="cancelbtn">Huỷ</button>
            </div>
        </div>
    </form>
</div>

<script>
    const repeatPassword = document.querySelector('input[name="psw-repeat"]');
    const password = document.querySelector('#signup input[name="psw"]');
    const btnSubmit = document.querySelector('#signup button[type="submit"]');
    
    repeatPassword.addEventListener('keyup', function() {
        if (repeatPassword.value != password.value) {
            repeatPassword.classList.add('active');
            btnSubmit.disabled = true;
            btnSubmit.style.cursor = 'not-allowed';
            repeatPassword.style.border = '1px solid red';
        } else {
            repeatPassword.classList.remove('active');
            btnSubmit.disabled = false;
            btnSubmit.style.cursor = 'pointer';
            repeatPassword.style.border = '1px solid #ccc';
        }
    });

    const error = document.querySelector('#signup label[for="error"]');
    const email = document.querySelector('#signup input[name="email"]');
    email.addEventListener('change', function() {
        const xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                var result = JSON.parse(this.responseText);
                if (result === true) {
                    btnSubmit.disabled = true;
                    error.innerHTML = "Email đã tồn tại";
                } else {
                    btnSubmit.disabled = false;
                    error.innerHTML = "";
                }
            }
        };
        xhttp.open("GET", "check_email.php?email=" + email.value, true);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhttp.send();
    });
</script>