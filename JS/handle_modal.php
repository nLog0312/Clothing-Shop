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
        // Get the modal
        var moda_signin = document.getElementById("signin");
        var modal_signup = document.getElementById("signup");

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal_signin || event.target == modal_signup) {
                modal.style.display = "none";
            }
        }
    </script> ';
?>