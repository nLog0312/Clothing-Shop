<?php
    echo  '
    <script>
        const sign_in = document.querySelector(".sign-in");
        const sign_up = document.querySelector(".sign-up");
        sign_in.addEventListener("click", function(e){
            document.querySelector("#signin").style.display = "block";
        });
        sign_up.addEventListener("click", function(e){
            document.querySelector("#signup").style.display = "block";
        });
        
        // When the user clicks anywhere outside of the modal, close it
        if (document.getElementById("signin") || document.getElementById("signup")) {
            // Get the modal
            var modal_signin = document.getElementById("signin");
            var modal_signup = document.getElementById("signup");
            window.onclick = function(event) {
                if (event.target == modal_signin) {
                    modal_signin.style.display = "none";
                } else if (event.target == modal_signup) {
                    modal_signup.style.display = "none";
                }
            }
        }
    </script> ';
?>