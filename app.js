function onloadCallback() {
        grecaptcha.execute("recaptcha")
        var response = grecaptcha.getResponse();

        if (response == 0) {
            document.querySelector('#submit6').disabled = true;
        } else {
            document.querySelector('#submit6').disabled = false;
        }
    }
    ;
    const todos = document.querySelector(".tudo");
    const logon = document.querySelector(".loglink");
    const register = document.querySelector(".signlink");
    var aval = '<?= $is_available ?>';
    console.log(aval);

    register.addEventListener("click", ()=>{
        todos.classList.add('active');
    }
    );
    logon.addEventListener("click", ()=>{
        todos.classList.remove('active');
    }
    );
    document.getElementById("teste1").style.display = "none";
    document.getElementById("submit").disabled = true;
    var check = function() {
        if (document.getElementById('password').value == document.getElementById('confirm_password').value) {
            document.getElementById('confirm_password').style.color = 'green';
            document.getElementById("submit").disabled = false;
        } else {
            document.getElementById('confirm_password').style.color = "red";
            document.getElementById("submit").disabled = true;
        }
    }

    const print = document.querySelector("#print2");
    const biogra = '';
    const nome2 = '';

    if (aval == false) {
        document.getElementById('body').style.display = 'none';
        document.getElementById('profile').style.display = 'block';
        document.getElementById('nickname').innerHTML = nome2;
        document.getElementById('nickname2').innerHTML = nome2;
        document.getElementById('biog').innerHTML = biogra;
        document.querySelector(".out").style.display = "block";
        document.getElementById("tabgold").checked = true;
    }

    document.getElementById("submit3").style.display = "none";
    document.getElementById("submit4").style.display = "none";

    function myFunction() {
        document.getElementById("bios").style.transition = "1s";
        document.getElementById("bios").style.borderColor = "blue";
    }

    function myFunction2() {
        document.getElementById("submit4").disabled = false;
        document.getElementById("bios2").style.transition = "1s";
        document.getElementById("bios2").style.borderColor = "blue";
    }

    function myFunction3() {
        document.getElementById("teste1").required;
    }

    document.getElementById("bios").style.display = "none";

    function myFunction8() {
        document.getElementById("bios").style.display = "block";
        document.getElementById("bios").style.borderColor = "#cecece";
        document.getElementById("submit35").style.display = "none";
        document.getElementById("biog").style.display = "none";
        document.getElementById("biosedit").style.display = "none";
        document.getElementById("submit3").style.display = "block";
    }

    function myFunction1() {
        document.getElementById("bios").style.display = "none";
    }

    var textarea = document.querySelector('#teste');
    textarea.addEventListener('keydown', autosize);

    function autosize() {
        var el = this;
        setTimeout(function() {
            el.style.cssText = 'height:auto; padding:0';
            // for box-sizing other than "content-box" use:
            // el.style.cssText = '-moz-box-sizing:content-box';
            el.style.cssText = 'height:' + el.scrollHeight + 'px';
        }, 0);
    }

    const salvar = document.getElementById("submit4");

    function myFunction3() {
        document.getElementById("submit4").style.display = "none";
        document.getElementById("submit5").style.display = "block";
        document.getElementById("bios2").style.display = "none";
        document.getElementById("nomeprof").style.display = "block"
        document.getElementById("teste1").style.display = "none";
    }

    const refreshButton = document.querySelector('#submit3');

    const refreshPage = ()=>{
        location.reload();
    }

    refreshButton.addEventListener('click', refreshPage)

    function myFunction4() {
        document.getElementById("bios2").style.display = "block";
        document.getElementById("nomeprof").style.display = "none";
        document.getElementById("submit5").style.display = "none";
        document.getElementById("bios2").style.borderColor = "#cecece";
        document.getElementById("submit4").style.display = "block";
        document.getElementById("nickname2").style.display = "none";
        document.getElementById("teste1").style.display = "block";
    }

    function myFunction10() {

        document.querySelector(".tudo").style.height = "376px";
        document.getElementById('name').focus();
    }

    function myFunction11() {
        document.getElementById("message").style.transform = "scale(1)";
        document.getElementById("message").style.position = "relative";
        document.querySelector(".tudo").style.height = "476px";
    }

    function myFunction12() {
        document.getElementById("message").style.transform = "scale(0)";
        document.getElementById("message").style.position = "absolute";
        document.querySelector(".tudo").style.height = "295px";
        document.getElementById("email2").focus();
    }

    function myFunction20() {
        document.querySelector(".popup").style.display = "block";
    }
    document.querySelector('.popup span').onclick = ()=>{
        document.querySelector('.popup').style.display = 'none';
    }

    function myFunction21() {
        document.querySelector('.popup').style.display = 'none';
    }

    function myFunction22() {
        if (img == 1) {
            document.querySelector("#popu2").style.display = "block";

            document.querySelector('#popu2 span').onclick = ()=>{
                document.querySelector('#popu2').style.display = 'none';
            }
        }
    }

    function myFunction23() {
        document.querySelector('.pass').style.transform = "scale(1)";
        document.querySelector('.log').style.transform = "scale(0)";
    }

    function myFunction24() {
        document.getElementById("imagem").style.transform = "scale(1)";
        document.getElementById("imagem").style.position = "relative";
        document.getElementById("imagem2").style.display = "none";
    }

    function backlog() {
        document.querySelector('.log').style.transform = "scale(1)";
        document.querySelector('.pass').style.transform = "scale(0)";
    }

    window.onunload = function() {
        document.querySelector(".tabgold").click();
    }

    let file = document.getElementById("file-input");
    let picpopup = document.getElementById("cropped2");

    function myFunction16() {
        document.querySelector(".popup").style.display = "block";
    }

    myFunction3();

    function myFunction6() {
        var x = document.getElementById("password2");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }

    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password2');
    togglePassword.addEventListener('click', function(e) {
        // toggle the type attribute
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        // toggle the eye slash icon
        this.classList.toggle('fa-eye-slash');
    });

    var checker3;

    function passlength() {
        var lent = document.getElementById('password2').value;
        if (lent.length >= 7) {
            checker3 = true;
        } else {
            checker3 = false;

        }
        return checker3;
    }

    document.getElementById('submit2').disabled = true;
    let checker2;

    function othername() {

        var validRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (email2.value.match(validRegex)) {
            checker2 = true;
            document.getElementById("email2").style.boxShadow = "";
        } else {
            document.getElementById("email2").style.boxShadow = "0 0 3px 2px red";
            checker2 = false;
        }
    }

    document.querySelector(".fname").addEventListener("keyup", buttonon);
    document.querySelector(".test").addEventListener("keyup", buttonon);

    function buttonon() {
        if (checker2 == true && checker3 == true) {
            document.getElementById('submit2').disabled = false;
        } else {
            document.getElementById('submit2').disabled = true;
        }
    }

    var myInput = document.getElementById("password");
    var letter = document.getElementById("letter");
    var capital = document.getElementById("capital");
    var special = document.getElementById("special");
    var number = document.getElementById("number");
    var length = document.getElementById("length");

    // When the user starts to type something inside the password field
    myInput.onkeyup = function() {
        // Validate lowercase letters
        var lowerCaseLetters = /[a-z]/g;
        if (myInput.value.match(lowerCaseLetters)) {
            letter.classList.remove("invalid");
            letter.classList.add("valid");
        } else {
            letter.classList.remove("valid");
            letter.classList.add("invalid");
        }

        // Validate capital letters
        var upperCaseLetters = /[A-Z]/g;
        if (myInput.value.match(upperCaseLetters)) {
            capital.classList.remove("invalid");
            capital.classList.add("valid");
        } else {
            capital.classList.remove("valid");
            capital.classList.add("invalid");
        }

        // Validate capital letters
        var specialLetters = /[!@#$%^&*_=+-]/g;
        if (myInput.value.match(specialLetters)) {
            special.classList.remove("invalid");
            special.classList.add("valid");
        } else {
            special.classList.remove("valid");
            special.classList.add("invalid");
        }

        // Validate numbers
        var numbers = /[0-9]/g;
        if (myInput.value.match(numbers)) {
            number.classList.remove("invalid");
            number.classList.add("valid");
        } else {
            number.classList.remove("valid");
            number.classList.add("invalid");
        }

        // Validate length
        if (myInput.value.length >= 8) {
            length.classList.remove("invalid");
            length.classList.add("valid");
        } else {
            length.classList.remove("valid");
            length.classList.add("invalid");
        }
    }

    // vars
    let result = document.querySelector('.result')
      , img_result = document.querySelector('.img-result')
      , img_w = document.querySelector('.img-w')
      , img_h = document.querySelector('.img-h')
      , options = document.querySelector('.options')
      , save = document.querySelector('.save')
      , cropped = document.querySelector('.cropped')
      , dwn = document.querySelector('.download')
      , upload = document.querySelector('#file-input')
      , cropper = '';
    // on change show image with crop options
    upload.addEventListener('change', (e)=>{
        if (e.target.files.length) {
            // start file reader
            const reader = new FileReader();
            reader.onload = (e)=>{
                if (e.target.result) {
                    // create new image
                    let img = document.createElement('img');
                    img.id = 'image';
                    img.src = e.target.result
                    // clean result before
                    result.innerHTML = '';
                    // append new image
                    result.appendChild(img);
                    // show save btn and options
                    save.classList.remove('hide');
                    options.classList.remove('hide');
                    // init cropper
                    cropper = new Cropper(image,{
                        aspectRatio: 1 / 1,
                        viewMode: 3,

                    })
                }
            }
            ;
            reader.readAsDataURL(e.target.files[0]);
        }
    }
    );

    // save on click
    save.addEventListener('click', (e)=>{
        // get result to data uri
        let imgSrc = cropper.getCroppedCanvas({
            width: img_w.value // input value
        }).toDataURL();
        // remove hide class of img
        cropped.classList.remove('hide');
        img_result.classList.remove('hide');
        // show image cropped
        cropped.src = imgSrc;
        document.getElementById("myinput").value = cropped.src;
        document.getElementById('salvar').style.display = "block";
        document.querySelector('.popup').style.display = "none";
        return img = 0;
    }
    );

    function geturl() {
        link1 = document.querySelector('.cropped').src;
        dados = JSON.stringify(link1);
        img = 1;
        return dados;
    }

    let link1;
    let dados;

    const src = geturl(dados);
