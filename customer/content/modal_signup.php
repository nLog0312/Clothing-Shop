<div id="signup" class="modal">
    <form class="modal-content animate" action="signup.php" method="post">
        <div class="imgcontainer">
            <span onclick="document.getElementById('signup').style.display='none'" class="close" title="Close Modal">&times;</span>
        </div>

        <div class="container-main">
            <div class="container-top">
                <label for="username"><b>Tên đăng nhập</b></label>
                <input type="text" placeholder="Tên đăng nhập..." name="username" required>

                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Email..." name="email" required>

                <label for="psw"><b>Mật khẩu</b></label>
                <input type="password" placeholder="Mật khẩu..." name="psw" required>

                <label for="psw-repeat"><b>Nhập lại mật khẩu</b></label>
                <input type="password" placeholder="Nhập lại mật khẩu..." name="psw-repeat" required>
                
                <label>
                    <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
                </label>

                <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>
            </div>
            
            <div class="container-bottom">
                <button type="submit">Đăng Ký</button>
                <button type="button" onclick="document.getElementById('signup').style.display='none'" class="cancelbtn">Huỷ</button>
            </div>
        </div>
    </form>
</div>