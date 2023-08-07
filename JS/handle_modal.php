<?php
    echo  '
    <script>
        const sign_in = document.querySelector(".sign-in");
        const sign_up = document.querySelector(".sign-up");
        sign_in?.addEventListener("click", function(e){
            document.querySelector("#signin").style.display = "block";
        });
        sign_up?.addEventListener("click", function(e){
            document.querySelector("#signup").style.display = "block";
        });
        
        // When the user clicks anywhere outside of the modal, close it
        // if (document.getElementById("signin") || document.getElementById("signup")) {
        //     // Get the modal
        //     var modal_signin = document.getElementById("signin");
        //     var modal_signup = document.getElementById("signup");
        //     window.onclick = function(event) {
        //         if (event.target == modal_signin) {
        //             modal_signin.style.display = "none";
        //         } else if (event.target == modal_signup) {
        //             modal_signup.style.display = "none";
        //         }
        //     }
        // }

        // Toggle password Sign In
        function togglePwdSignIn() {
            var pwd = document.querySelector("#signin input[name=psw]");
            var iconEye = document.querySelector("#signin ion-icon[name=eye-outline]");
            var iconEyeOff = document.querySelector("#signin ion-icon[name=eye-off-outline]");

            if (pwd.type === "password") {
                pwd.type = "text";
                iconEye.hidden = true;
                iconEyeOff.hidden = false;
            } else {
                pwd.type = "password";
                iconEye.hidden = false;
                iconEyeOff.hidden = true;
            }
        }

        // Toggle password Sign Up
        function togglePwdSignUp() {
            var pwd = document.querySelector("#signup .psw input[name=psw]");
            var iconEye = document.querySelector("#signup .psw ion-icon[name=eye-outline]");
            var iconEyeOff = document.querySelector("#signup .psw ion-icon[name=eye-off-outline]");

            if (pwd.type === "password") {
                pwd.type = "text";
                iconEye.hidden = true;
                iconEyeOff.hidden = false;
            } else {
                pwd.type = "password";
                iconEye.hidden = false;
                iconEyeOff.hidden = true;
            }
        }

        // Toggle password repeat Sign Up
        function togglePwd() {
            var pwd = document.querySelector("#signup .psw-repeat input[name=psw-repeat]");
            var iconEye = document.querySelector("#signup .psw-repeat ion-icon[name=eye-outline]");
            var iconEyeOff = document.querySelector("#signup .psw-repeat ion-icon[name=eye-off-outline]");

            if (pwd.type === "password") {
                pwd.type = "text";
                iconEye.hidden = true;
                iconEyeOff.hidden = false;
            } else {
                pwd.type = "password";
                iconEye.hidden = false;
                iconEyeOff.hidden = true;
            }
        }
    </script> ';
?>