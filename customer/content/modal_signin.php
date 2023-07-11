<div id="signin" class="modal">
    <form class="modal-content animate" action="signin.php" method="post">
        <div class="imgcontainer">
            <span onclick="document.getElementById('signin').style.display='none'" class="close" title="Close Modal">&times;</span>
        </div>

        <div class="container-main">
            <div class="container-top">
                <label for="uname"><b>Tài Khoản</b></label>
                <input type="text" placeholder="" name="uname" required>

                <label for="psw"><b>Mật Khẩu</b></label>
                <input type="password" placeholder="" name="psw" required>
            </div>
            
            <div class="container-bottom">
                <button class="gray" type="submit">Đăng Nhập</button>
                <label>
                    <input type="checkbox" checked="checked" name="remember"> Ghi nhớ đăng nhập
                </label>
            </div>
        </div>

        <div class="container-cancel" style="background-color:#f1f1f1">
            <button type="button" onclick="document.getElementById('signin').style.display='none'" class="cancelbtn">Huỷ</button>
            <span class="psw">Quên <a href="#">mật khẩu?</a></span>
        </div>
    </form>
</div>