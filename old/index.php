<?php
session_set_cookie_params(['httponly' => true]); 
session_start();
?>

<!--Atualização portfolio - 06/11!-->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">

  <meta name="viewport" content="initial-scale=1">
  <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js"></script>
   <script src="https://unpkg.com/scrollreveal@4"></script>
  <link rel="stylesheet" href="/resources/css/app.css">

</head>
<body>
    <?php 
    
    if (!isset($_SESSION["user_id"])) {
        $is_available = false;
    }
    
    if(isset($_SESSION['cred_error'])) {
        $cred_error = $_SESSION['cred_error'];
    }else{
        $cred_error = false;
    }
        
    
    
    if (isset($_SESSION["user_id"])) {
        require __DIR__ . "/resources/php/env.php";
        $sql_qy_id = "SELECT * FROM ninjinha WHERE id = ('".$_SESSION['user_id']."') ";
        $resulte = $conn-> query($sql_qy_id);
        $ninjinha = $resulte-> fetch_assoc();
        $_SESSION["user_id"] = $ninjinha["id"];
        $is_available = $_SESSION["is_available"];
        
        $fid = $_SESSION["user_id"]; 
        
        $qry = "SELECT `img` from `ninjinha` WHERE `id`='$fid'";
        $rsult = $conn->query($qry);
        $fetch_img = $rsult->fetch_assoc();
        $arr_img = implode($fetch_img);
        
    }
    
    ?>
  <div class="mytabs">
      <input type="radio" class="tabs__radio" name="mytabs" id="tab3">
  <label for="tab3" class="tabs__label" style="position: absolute;
    transform: translateX(-50%);
    left: 50%;" id=search-tab></label>
  <div class="tabs__content">
    <form method="post" id="usersearch"><div id="search">
        <input id="player-name" name="player-name" class="search" placeholder="Username" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" onkeypress="checkUser()"><button id="search-button" name="send-button" ><i class="bi bi-search"></i></button></div></form>
              <div id="body-mine" style=" display:none;
                position: absolute;
                height: 100vh;
                width: 100%; justify-content: center;
                align-items: center;">
                <div id="mine-user" style="background: white;
                width: 80%;
                height: 75%;
                border-radius: 30px; position: absolute;">
                <div id="usermineinfo"></div>
                </div>
            </div>
    </div>
    <input type="radio" id="tabfree" name="mytabs" checked="checked" style="display:none;">
    <label for="tabfree" class="fas fa-info icon1 icone" id="initial"></label>
    
    <?php
        require __DIR__ . "/resources/php/env.php";
        if(isset($_POST['send-button'])){
            
            $search = $_POST['player-name'];
            
            if($search != NULL){
                
                $request = mysql_query("SELECT * FROM ninjinha WHERE Nome LIKE '%$search%' ");
                
                if($request != 0){
                    
                    while($return = mysqli_fetch_array($request)){
                        $row = mysql_num_rows($request);
                        }
                    }
                }
            }
      ?>
    <div class="tab" id="tab1">
      <div class="main">
        <div class="text1">
          <h1>
            Search knowledge..<blink>│</blink>
          </h1>
          <span style="color:#cfcfcf;">
            <i>E.T. Bilu</i>
          </span>
        </div>
        <img class="cat" src="https://cdn1.iconfinder.com/data/icons/education-941/512/Smart.png">
      </div>
      <div id="proj" style="position: relative;
    top: -138px;
    width: 100%;
    z-index: -1;
    display: flex;
    flex-direction: column;
">
      <svg id="wave" style="transition: 0.3s display:block; position: relative; bottom: -4px;" viewBox="0 0 1440 100" version="1.1" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMinYMin meet"><defs><linearGradient id="sw-gradient-0" x1="0" x2="0" y1="1" y2="0"><stop stop-color="rgba(230, 225, 218, 1)" offset="0%"></stop><stop stop-color="rgba(230, 225, 218, 1)" offset="100%"></stop></linearGradient></defs><path style="transform:translate(0, 0px); opacity:1" fill="url(#sw-gradient-0)" d="M0,10L34.3,21.7C68.6,33,137,57,206,60C274.3,63,343,47,411,41.7C480,37,549,43,617,50C685.7,57,754,63,823,68.3C891.4,73,960,77,1029,68.3C1097.1,60,1166,40,1234,30C1302.9,20,1371,20,1440,16.7C1508.6,13,1577,7,1646,15C1714.3,23,1783,47,1851,50C1920,53,1989,37,2057,35C2125.7,33,2194,47,2263,55C2331.4,63,2400,67,2469,56.7C2537.1,47,2606,23,2674,15C2742.9,7,2811,13,2880,18.3C2948.6,23,3017,27,3086,33.3C3154.3,40,3223,50,3291,48.3C3360,47,3429,33,3497,28.3C3565.7,23,3634,27,3703,31.7C3771.4,37,3840,43,3909,48.3C3977.1,53,4046,57,4114,56.7C4182.9,57,4251,53,4320,48.3C4388.6,43,4457,37,4526,35C4594.3,33,4663,37,4731,38.3C4800,40,4869,40,4903,40L4937.1,40L4937.1,100L4902.9,100C4868.6,100,4800,100,4731,100C4662.9,100,4594,100,4526,100C4457.1,100,4389,100,4320,100C4251.4,100,4183,100,4114,100C4045.7,100,3977,100,3909,100C3840,100,3771,100,3703,100C3634.3,100,3566,100,3497,100C3428.6,100,3360,100,3291,100C3222.9,100,3154,100,3086,100C3017.1,100,2949,100,2880,100C2811.4,100,2743,100,2674,100C2605.7,100,2537,100,2469,100C2400,100,2331,100,2263,100C2194.3,100,2126,100,2057,100C1988.6,100,1920,100,1851,100C1782.9,100,1714,100,1646,100C1577.1,100,1509,100,1440,100C1371.4,100,1303,100,1234,100C1165.7,100,1097,100,1029,100C960,100,891,100,823,100C754.3,100,686,100,617,100C548.6,100,480,100,411,100C342.9,100,274,100,206,100C137.1,100,69,100,34,100L0,100Z"></path></svg>
      <div style="background: #e6e1da;"><h3 class="projects" style="text-align: center; bottom: 20px;">Our Projects</h3>
      <div class="todos_projetos" style="background-image: url(/stackedwaves.svg);
    background-repeat-x: no-repeat;
    width: 100%;
    background-size: cover;
    position: relative;
    top: 0px; display: flex; flex-direction: column;
    align-items: center;">
<div id="projetos">
<svg id="10015.io" viewBox="0 0 480 480"
xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" >
	<defs>
		<clipPath id="blob">
			<path fill="#474bff" d="M418,262.5Q377,285,372,308.5Q367,332,366,372Q365,412,333,419.5Q301,427,270.5,439Q240,451,214.5,423.5Q189,396,151,405.5Q113,415,94.5,387Q76,359,74.5,326.5Q73,294,53.5,267Q34,240,45.5,210.5Q57,181,73.5,156Q90,131,109,108.5Q128,86,147.5,51.5Q167,17,203.5,19Q240,21,273.5,28Q307,35,317,78Q327,121,371,117Q415,113,426.5,144.5Q438,176,448.5,208Q459,240,418,262.5Z" />
		</clipPath>
	</defs>
	<image x="0" y="0" width="100%" height="100%" clip-path="url(#blob)" xlink:href="https://art.pixilart.com/8bae488c7808f9e.gif" preserveAspectRatio="xMidYMid slice"></image>
</svg>
  <div class="resume">
    <h3>Snake Game <i class="fa fa-github" style="font-size:30px;color:#170b7d"></i></h3>
  <p style="z-index: 10;">This snake game project was mande wiht javascript, it comes with great features.</p></div>
</div>
<div class="projeto2">
<svg id="10015.io" viewBox="0 0 480 480" onclick="window.location='https://codepen.io/Pedro-Miguel-the-solid/full/XWoQjjz';" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" >
	<defs>
		<clipPath id="blob">
			<path fill="#474bff" d="M418,262.5Q377,285,372,308.5Q367,332,366,372Q365,412,333,419.5Q301,427,270.5,439Q240,451,214.5,423.5Q189,396,151,405.5Q113,415,94.5,387Q76,359,74.5,326.5Q73,294,53.5,267Q34,240,45.5,210.5Q57,181,73.5,156Q90,131,109,108.5Q128,86,147.5,51.5Q167,17,203.5,19Q240,21,273.5,28Q307,35,317,78Q327,121,371,117Q415,113,426.5,144.5Q438,176,448.5,208Q459,240,418,262.5Z" />
		</clipPath>
	</defs>
	<image x="0" y="0" width="100%" height="100%" clip-path="url(#blob)" xlink:href="https://seucreditodigital.com.br/wp-content/uploads/2023/09/pagamentos-inss-1127x720.jpg.webp" preserveAspectRatio="xMidYMid slice"></image>
</svg>
  <div class="resume">
  <h3>Calcudora INSS e IRRF    <i class="fa fa-github" style="font-size:30px;color:#170b7d"></i></h3>
    <p>Calcula a os descontos de previdência e imposto de renda do bruto considerando a tabela de 2023.</p></div>
  <span class="cursor"></span>
  </div>
  <div style="width: 100%; text-align: center;">
<h3 style="margin:20px;">Outros projetos</h3></div>
<div class="outros">
  <div class="outro_proj">
    <svg id="imagem" viewBox="0 0 480 480" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" >
	<defs>
		<clipPath id="blob">
			<path fill="#474bff" d="M418,262.5Q377,285,372,308.5Q367,332,366,372Q365,412,333,419.5Q301,427,270.5,439Q240,451,214.5,423.5Q189,396,151,405.5Q113,415,94.5,387Q76,359,74.5,326.5Q73,294,53.5,267Q34,240,45.5,210.5Q57,181,73.5,156Q90,131,109,108.5Q128,86,147.5,51.5Q167,17,203.5,19Q240,21,273.5,28Q307,35,317,78Q327,121,371,117Q415,113,426.5,144.5Q438,176,448.5,208Q459,240,418,262.5Z" />
		</clipPath>
	</defs>
	<image x="0" y="0" width="100%" height="100%" clip-path="url(#blob)" xlink:href="https://art.pixilart.com/8bae488c7808f9e.gif" preserveAspectRatio="xMidYMid slice"></image>
</svg>
    <p style="margin: 0;">trabalho em py</h>
  </div>
  <div class="outro_proj">
  <svg id="imagem" href="codepen.io/Pedro-Miguel-the-solid/pen/MWZzMem" viewBox="0 0 480 480" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" >
	<defs>
		<clipPath id="blob">
			<path fill="#474bff" d="M418,262.5Q377,285,372,308.5Q367,332,366,372Q365,412,333,419.5Q301,427,270.5,439Q240,451,214.5,423.5Q189,396,151,405.5Q113,415,94.5,387Q76,359,74.5,326.5Q73,294,53.5,267Q34,240,45.5,210.5Q57,181,73.5,156Q90,131,109,108.5Q128,86,147.5,51.5Q167,17,203.5,19Q240,21,273.5,28Q307,35,317,78Q327,121,371,117Q415,113,426.5,144.5Q438,176,448.5,208Q459,240,418,262.5Z" />
		</clipPath>
	</defs>
	<image x="0" y="0" width="100%" height="100%" clip-path="url(#blob)" xlink:href="https://art.pixilart.com/8bae488c7808f9e.gif" preserveAspectRatio="xMidYMid slice"></image>
    <p style="margin: 0;">Trabalho em py</p>
</svg>
  </div>
  <div class="outro_proj">
    <svg id="imagem" viewBox="0 0 480 480" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" >
	<defs>
		<clipPath id="blob">
			<path fill="#474bff" d="M418,262.5Q377,285,372,308.5Q367,332,366,372Q365,412,333,419.5Q301,427,270.5,439Q240,451,214.5,423.5Q189,396,151,405.5Q113,415,94.5,387Q76,359,74.5,326.5Q73,294,53.5,267Q34,240,45.5,210.5Q57,181,73.5,156Q90,131,109,108.5Q128,86,147.5,51.5Q167,17,203.5,19Q240,21,273.5,28Q307,35,317,78Q327,121,371,117Q415,113,426.5,144.5Q438,176,448.5,208Q459,240,418,262.5Z" />
		</clipPath>
	</defs>
	<image x="0" y="0" width="100%" height="100%" clip-path="url(#blob)" xlink:href="https://art.pixilart.com/8bae488c7808f9e.gif" preserveAspectRatio="xMidYMid slice"></image>
      <p style="margin: 0;">Trabalho em py</p>
</svg>
  </div>
</div>
</div>
      </div></div>
            </div>
    
    <div class="tab"></div>
    <input type="radio" id="tabgold" name="mytabs" style="display:none;">
    <label for="tabgold" class="fas fa-user-circle icon3 icone">
      <span id="nickname"></span>
      <span id="logmsg" style="
  font-size: 20px;
  cursor: pointer; font-family: 'Wix Madefor Display', sans-serif;">Log in</span>
      <a href="/resources/php/logout.php" class="out fas fa-sign-out-alt fa-rotate-180"></a>
    </label>
    <div class="tab" id="tab2">
      <div id="body">
          
        <div class="alert alert-warning alert-dismissible fade show" role="alert" id="wrong">
            <p style="color: #a30000;">Usuário ou senha estão incorretos!</p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="tudo">
          <div class="forms log">
            <h3 id="logon">Log in</h3>
            <div class="box">
              <form action="/resources/php/login_process.php" method="POST" autocomplete="off">
                <input id="email2" type='email' name="em_lg" placeholder="email" class="fname" onkeyup="othername()">
                <div class="view">
                  <a class="forgot" style="color:blue;" onclick="myFunction23()">Forgot password?</a>
                  <input type="password" id="password2" class="test" name="ps_lg" placeholder="password" onkeyup="passlength()">
                  <i class="fas fa-eye" id="togglePassword" style="margin-left: -50px; cursor: pointer; position: absolute; line-height: 3.3em; color: #202124b8;"></i>
                </div>
                <input id="submit2" type="submit" name="submit_5678">
              </form>
              <p class="text">don't have an account?<a href="#logon" class="signlink register" onclick="myFunction10()" onkeydown="return (event.keyCode!=9);">&nbsp;register</a></p>
            </div>
          </div>

          <div class="forms sign">
            <h3 id="logon">Sign up</h3>
            <form action="/resources/php/sign_process.php" name="logan" method="POST">
              <input id="name" type="name" name="nm_sg" placeholder="name" autofocus required autocomplete="off">
              <input id="email" type="email" placeholder="email" name="em_sg" required autocomplete="off">
              <input type="password" id="password" for="password" class="password" name="ps_sg" placeholder="password" minlength="8" onkeyup='check();'"^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$" onfocus="myFunction11()" required>
              <input type="password" id="confirm_password" name="confirm_password" placeholder="confirm password" onkeyup='check();'>
              <div id="message">
                <p id="letter" class="invalid">A <b>lowercase</b>letter</p>
                <p id="capital" class="invalid">A <b>uppercase</b>letter</p>
                <p id="number" class="invalid">A <b>number</b></p>
                <p id="special" class="invalid">A <b>special</b>character</p>
                <p id="length" class="invalid">Minimum <b>8 characters</b></p>
              </div>
              <input id="submit" type="submit" name="submit_0123">
            </form>
            <p class="text">do you already have?<a href="#" class="loglink register" onclick="myFunction12()" onkeydown="return (event.keyCode!=9);">&nbsp;log in</a></p>
          </div>
          <div class="forms pass">
            <h3 id="logon">Reset Password</h3>
            <form action="" method="POST" autocomplete="off" id="recp">
              <input id="email3" type="email" placeholder="email" name="em_lg" required autocomplete="off">
              <input id="submit6" type="submit">
            </form>
            <p class="text">back log in <a href="#" style="display: block;" onkeydown="return (event.keyCode!=9);" onclick="backlog()">&nbsp;here</a></p>
          </div>
        </div>
        <button href="#" class="block" onkeydown="return (event.keyCode!=9);"></button>
      </div>
      <div id="profile" style="display: none;">
        <div class="conta">
          <div class="popup">
            <span class="X">×</span>
            <main class="page">
              <!-- input file -->
              <div class="box2" style="display:none;">
                <input type="file" id="file-input">
              </div>
              <!-- leftbox -->
              <div class="box-2">
                <div class="result"></div>
              </div>
              <!--rightbox-->
              <div class="box-2 img-result hide">
                <!-- result of crop -->
              </div>
              <!-- input file -->
              <div class="box4">
                <button class="btn save hide">Concluir</button>
                <div class="options hide">
                  <label>Width</label>

                  <input type="number" class="img-w" value="300" min="10000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000" max="1200" />
                </div>
              </div>
              <!-- save btn -->
              <!-- download btn -->
          </div>
          </main>
          <div class="mainly">
          <div class="perfil">
            <div class="pictures">
              <div class="desc">
                <div class="pictur">
                  <div class="profpic">
                    <!--Aqui vai o php-->
                    
                <?php
                    
                    if(isset($_SESSION['img'])) {
                        $willow = $_SESSION['img'];
                    }
                    
                ?>
                    
                    <img class="cropped" id="cropped" alt="" src='<?= $arr_img; ?>';  onerror="this.onerror=null;this.src='https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png';" onclick="myFunction22()">
                    <form action="/resources/php/process_image.php" method="POST" style="position:absolute;">
                      <input id="myinput" name="img" type="hidden" value="">
                      <button type="submit" id="salvar" style="display:none;">Salvar</button>
                    </form>
                  </div>
                  <div id="popu2">
                    <img id="cropped2" class="cropped2" alt="" style="width: clamp(50px, 70%, 500px);" src='<?= $arr_img; ?>';>
                    <span class="X">×</span>
                  </div>
                  <label for="file-input" class="fas fa-edit icon5" onclick="myFunction20()"></label>
                </div>
                <div class="boxcrop"></div>
                <div id="bios2">
                  <form action="edit-name.php" method="POST">
                    <input type="text" id="teste1" name="textt" required></input>
                    <input id="submit4" name="submit4" type="submit" onclick="myFunction3()"></input>
                  </form>
                </div>
                <span id="nickname2"></span>
                <button id="submit5" type="submit" onclick="myFunction4()">editar</button>
                <p id="nomeprof"></p>
              </div>
            </div>
            <div class="inferior">
              <div class="timeline">
                <span id="biosedit" style="font-family:'Wix Madefor Display', sans-serif;">Bios<button id="submit35" onclick="myFunction8()">editar</button>
                </span>
                <div id="bios">
                  <form action="edit-bio.php" method="POST">
                    <input id="submit3" type="submit" onclick="myFunction1()">
                    <textarea rows="1" type="text" id="teste" name="bio" placeholder="Write about you" maxlength="255" onclick="myFunction()"></textarea>
                  </form>
                </div>
                <span id="biog"></span>
              </div>
            </div>
          </div>
        </div>
        </div>
      </div>
    </div>
    </div>
    <script>
    
    const credential =  '<?= $cred_error; ?>';
    if(credential == 1){
        document.getElementById("tabgold").checked = true;
        document.querySelector(".tudo").style.display="none";
        setTimeout(() => {
            
            document.querySelector(".tudo").style.display="block";
            document.querySelector('.close').onclick = ()=>{
                document.getElementById("wrong").style.transform ="scale(0)";
            }
            
        }, 2);
        
        setTimeout(() => {
            document.querySelector(".tudo").style.display="flex";
            document.getElementById("wrong").style.top ="60px";
        }, 2);
        
            if(credential == 1){
    setTimeout(() => {
            document.getElementById("wrong").style.transform ="scale(0)";
        }, 5000);}
    }
    
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
    var aval = '<?= $is_available; ?>'; 
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
    const nome2 = "<?= $_SESSION['name_id'] = "willou"; ?>";

    if (aval == true) {
        document.getElementById('body').style.display = 'none';
        document.getElementById('profile').style.display = 'block';
        document.getElementById('nickname').innerHTML = nome2;
        document.getElementById('nickname2').innerHTML = nome2;
        document.getElementById('biog').innerHTML = biogra;
        document.querySelector(".out").style.display = "block";
        document.getElementById("tabgold").checked = true;
        document.getElementById('logmsg').style.display="none";
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
        if (cropped.src != 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png') {
            
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
    
    document.querySelector('#player-name').onkeyup = ()=>{
        document.getElementById("tab3").checked = true;
        document.getElementById("body-mine").style.display="flex";
    }
    
    document.querySelector('#tabgold').onclick = ()=>{
        document.getElementById("body-mine").style.display="none";
    }
    
    document.querySelector('#tabfree').onclick = ()=>{
        document.getElementById("body-mine").style.display="none";
    }
    
    window.onunload = function() {
        document.querySelector(".tabgold").click();
    }
    
    document.getElementById("body-mine").style.display="none";

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
        return dados;
    }

    let link1;
    let dados;
    
    const src = geturl(dados);
    

    </script>
  </body>
</html>
