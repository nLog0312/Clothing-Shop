<script>
        let lstImg = document.querySelectorAll('.list-img .img');
        let imgFather = document.querySelector('.product-img .img-father');
        lstImg.forEach(img => {
            img.addEventListener('click', function() {
                let src = this.querySelector('input').src;
                imgFather.src = src;
            })
        })

        let nextImg = document.querySelector('.product-img--bottom .nextImg');
        let preImg = document.querySelector('.product-img--bottom .prevImg');
        let listImg = document.querySelector('.list-img');
        let width = 0;
        nextImg.addEventListener('click', function() {
            if (width == 200) return;
            width += 100;
            listImg.scroll({
                left: width,
                behavior: 'smooth'
            })
        })
        preImg.addEventListener('click', function() {
            if (width == 0) return;
            width -= 100;
            listImg.scroll({
                left: width,
                behavior: 'smooth'
            })
        })


        let lstColor = document.querySelectorAll('.color-item input');
        let lstSize = document.querySelectorAll('.size-item input');
        let btnCart = document.querySelector('.footer-right button');
        btnCart.disabled = true;
        btnCart.style.cursor = 'not-allowed';
        let color = '';
        let size = '';
        lstColor.forEach((input, index) => {
            input.addEventListener('click', function() {
                color = this.value;
                checkValidate();
                document.querySelector(`label[for=color-${index}]`).classList.add('active');
                lstColor.forEach((input, index) => {
                    if (input.value != color) {
                        document.querySelector(`label[for=color-${index}]`).classList.remove('active');
                    }
                })
            })
        })
        lstSize.forEach(input => {
            input.addEventListener('click', function() {
                size = this.value;
                checkValidate();
            })
        })
        function checkValidate() {
            if (color == '' || size == '') {
                btnCart.disabled = true;
                btnCart.style.cursor = 'not-allowed';
            } else {
                btnCart.disabled = false;
                btnCart.style.cursor = 'pointer';
            }
        }
    </script>