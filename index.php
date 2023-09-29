<?php
if ( ! isset($_SESSION["user_id"])) {
    session_set_cookie_params(['httponly' => true]);
    session_start();
}

require __DIR__. "/database.php";
  if (isset($_SESSION["user_id"])) {
        $sql03 = "SELECT * FROM ninjinha WHERE id = ('".$_SESSION['user_id']."') ";
        $result = $conexao-> query($sql03);
        $ninjinha = $result-> fetch_assoc();
        $_SESSION["user_id"] = $ninjinha["id"];
        var_dump($_SESSION);
  }

?>

<script>
<?php
require __DIR__ . "/database.php";
  $sql01 = sprintf("SELECT * FROM ninjinha WHERE Email = '%s'", $conexao-> real_escape_string($_POST["email2"]));
  $result = $conexao-> query($sql01);
  $is_available = ($result-> num_rows === 0);
?>

<?php ?>
</script>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">

  <meta name="viewport" content="initial-scale=1">
  <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css" rel="stylesheet">
</head>
<style>
   @import url('https://fonts.googleapis.com/css2?family=Wix+Madefor+Display&display=swap');
  @import url('https://fonts.googleapis.com/css2?family=Raleway:wght@100&display=swap');
  @import url('https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;1,100&display=swap');

  html {
    background: rgb(32, 36, 104);
    background: linear-gradient(315deg, rgba(32, 36, 104, 1) 0%, rgba(46, 55, 172, 1) 100%);
  }

  body {
    margin: 0;
  }

  .mytabs {
    display: flex;
    flex-wrap: wrap;
    height: 100svh;
    align-content: flex-start;
  }

  .mytabs input[type="radio"] {
    display: none;
  }

  .mytabs .icone {
    padding: 25px;
    font-weight: bold;
  }

  .mytabs .tab {
    width: 100%;
    order: 1;
    display: none;
  }

  .mytabs .tab h2 {
    font-size: 3em;
  }

  .mytabs input[type='radio']:checked+label+.tab {
        display: block;
  }

  .mytabs input[type="radio"]:checked+label {}
  
   
  .menu {
    display: flex;
    justify-content: space-between;
    margin: 20px;
  }

  .icone {
    filter: invert(90%);
    font-size: 22px;
    position: absolute;
  }

  .icon1:hover::before {
    content: "about";
    animation: animatedContent 1s;
    color: #cfcfcfc;
    font-family: 'Wix Madefor Display', sans-serif;
  }

  .icon2:hover::before {
    content: "home";
    animation: animatedContent 1s;
    color: #cfcfcfc;
    font-family: 'Wix Madefor Display', sans-serif;
  }

  .icon3:hover::before {
    content: "profile";
    animation: animatedContent 1s;
    color: #cfcfcfc;
    font-family: 'Wix Madefor Display', sans-serif;
  }

  .icon2 {
    left: 8%;
  }

  .icon3 {
    right: 0%;
    display: flex;
    flex-direction: row-reverse;
  }
  
  .icon5{
    padding: 10px;
    background: #cecece;
    border-radius: 50%;
    /* filter: invert(1); */
    position: absolute;
    /* right: 0; */
    /* top: 0; */
    margin: -15px;
  }

  .main {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }

  h1,
  p {
    text-align: center;
    font-family: 'Wix Madefor Display', sans-serif;
    color: #cfcfcf;
    margin: 0;
  }

  blink {
    font-size: 25px;
    animation: blink 1.2s infinite;
  }

  @keyframes blink {
    0% {
      opacity: 0
    }

    49% {
      opacity: 0
    }

    50% {
      opacity: 1
    }
  }

  .cat {
    animation-name: cat;
    animation-duration: 3s;
    animation-iteration-count: infinite;
    animation-timing-function: ease-in-out;
    margin-left: 30px;
    margin-top: 5px;
  }

  .cat {
    width: 300px;
    height: 300px;
  }

  @keyframes cat {
    0% {
      transform: translate(0, 0px);
    }

    50% {
      transform: translate(0, 15px);
    }

    100% {
      transform: translate(0, -0px);
    }
  }

  h3 {
    font-family: 'Wix Madefor Display', sans-serif;
    margin: 5px;
    margin-bottom: 15px;
    font-size: 30px;
  }

  #submit,
  #submit2,
  .btn, #submit6{
    width: 25%;
    height: 35px;
    border-radius: 5px;
    border-style: none;
    line-height: 12px;
  }

  #submit:hover,
  #submit2:hover,
  .btn:hover,
  #submit6:hover{
    background-color: #34319c;
    color: white;
    transition: 0.5s;
  }

  .tab {
    height: 100%;
  }

  #nickname {
    font-family: 'Wix Madefor Display', sans-serif;
    color: #181818;
    margin-right: 10px;
    line-height: 1.2;
    font-size: 20px;
  }

  #nickname2 {
    text-align: center;
    margin: 15px 0px 0px;
    font-family: 'Wix Madefor Display', sans-serif;
    font-size: large;
    margin: 0px;
    white-space: nowrap;
    border-bottom: 1px solid #cecece;
    margin: 20px 0px 0px;
    width: max-content;
  }

  .tudo {
    position: relative;
    width: 300px;
    height: 295px;
    overflow: hidden;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 10px;
  }
  
  
  .sign {
    display: flex;
    flex-direction: column;
  }

  .box {
    position: relative;
  }

  form {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin: 0px;
  }
  
  .forgot{
    display: flex;
    flex-direction: row-reverse;
    position: relative;
    right: 23px;
    margin-top: 8px;
    font-size: 14px;
  }

  .tudo .forms {
    width: 100%;
    border-radius: 10px;
    background-color: white;
    display: flex;
    flex-direction: column;
    align-items: center;
    margin: 10px;
  }

  .tudo .forms.log {
    /*display: none;*/
  }

  .tudo.active .forms.log {
    transition: none;
    transform: translateX(0px)
  }

  .tudo .forms.sign {
    position: absolute;
    transform: translateX(400px);
    border-radius: 10px;
  }

  .tudo.active .forms.log {
    transition: none;
    transform: translateX(-400px)
  }

  .tudo.active .forms.sign {
    transition: none;
    transform: translateX(0px)
  }
  
  .forgot:focus.log{
      display:none;
  }

  input {
    margin: 5px 20px;
    padding: 12px;
    font-size: 15px;
    border: none;
    border-radius: 8px;
    background: #cecece61;
  }

  input:focus {
    outline-style: none;
    box-shadow: 0 0 2px 2px #3091d7;
    transition: 0.2s ease-in-out;
  }

  h3,
  p {
    margin: 10px;
  }

  #body {
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .text1 {
    color: black;
    font-size: 15px;
    text-align: center;
    margin: 10px;
  }

  a {
    text-decoration: none;
    display: none;
    font-family: 'Wix Madefor Display', sans-serif;
    cursor: pointer;
  }
  
  .out{
    color: #202124;
    display: none;
    font-size: 24px;
    margin: 8px;
    line-height: 0;
}

  #profile {
    height: 100%;
    display: none;
  }

  .conta {
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  
  .mainly{
      width: 70%;
  }

  .perfil {
    background: white;
    width: 100%;
    height: 70%;
    border-radius: 25px;
    display: flex;
  }
  
  .pictur{
    display: flex;
    flex-direction: column-reverse;
    align-items: center;
  }

    
  .cropped {
    width: 160px;
    border-radius: 50%;
    box-shadow: 0px 0px 0px 3px #cecece;
    padding: 0;
  }

  .inferior {
    height: 50%;
    width: 100%;
    display: flex;
  }

  .desc {
    height: 100%;
    margin: 15px;
    display: flex;
    align-items: center;
    flex-direction: column;
  }

  .timeline {
    height: 100%;
    width: 100%;
  }
  .fa-sign-out-alt:before{
    position: absolute;
    line-height: 0.4;
  }
  
  .register{
      color: blue;
      display: inline-block;
  }
  
  #bios2 {
    margin: 15px 15px 0px;
  }

  #teste,
  #teste1 {
    resize: none;
    white-space: ;
    outline: none;
    margin: 0px;
    border: none;
    overflow: hidden;
    box-shadow: none;
    padding: 0px;
    font-size: 16px;
    width: 100%;
    background: white;
    text-align: center;
    border-bottom: 1px solid #cecece;
    border-radius: 0px;
  }

  #submit3,
  #submit35,
  #submit4,
  #submit5 {
    float: right;
    background: none;
    border: none;
    font-family: 'Wix Madefor Display', sans-serif;
    font-size: 16px;
    padding: 0;
    color: #222771;
    -webkit-transition: all 0.3s ease-in-out 0s;
    transition: all 0.3s ease-in-out 0s;
  }
  
  #teste1{
      margin:15px 0px 5px;
  }

  #submit4 {
    right: 0;
  }
  
  #submit35{
      width: fit-content;
  }

  #submit3:hover,
  #submit4:hover,
  #submit5:hover,
  #submit35:hover{
    color: #0396ff;
  }

  #nomeprof {
    color: black;
    text-align: center;
    font-size: 18px;
    margin: 10px 0px 0px;
    font-family: 'Wix Madefor Display', sans-serif;
  }

  #submit5 {
    display: block;
  }
  
  #input-file{
      display: none;
  }
  
  .profpic{
    display: flex;
    align-items: center;
    justify-content: center;
  }
  
  
  #salvar{
      background: transparent;
      border:none;
      border-radius: 50%;
      color: white;
      font-size: 20px;
      font-family: 'Wix Madefor Display', sans-serif;
  }
  
  #salvar:hover{
      background:#0000008f;
      width: 160px;
      height: 160px;  
      transition: all 0.5s ease-in-out;
  }
  
  .pic2{
  height: 90%;
  border-radius: 5%;
  top: 50%;
    left: 50%;
    position: relative;
    transform: translate(-50%, -50%);
}

.popup{
  width: 100%;
  height: 100%;
  display: none;
  position: absolute;
  z-index: 100;
  top: 0;
  left: 0;
  background: rgba(0,0,0,.9);
}

.pass{
    position: absolute;
    transform: scale(0);
    transform: height .2s ease;
}

#cropped2{
    max-width: 80%;
    height: auto;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

#popu2{
  width: 100%;
  height: 100%;
  display: none;
  position: absolute;
  z-index: 100;
  top: 0;
  left: 0;
  background: rgba(0,0,0,.9);
}

.X{
  color: white;
  font-size: 40px;
  top: 0;
  margin: 20px;
  position: absolute;
}


.page {
    display: flex;
    height: 100%;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.text{
    color: black;
    font-size: 15px;
    display: inherit;
}

.box2 {
	padding: 0.5em;
	width: 100%;
	margin:0.5em;
}

.box-2 {
	padding: 0.5em;
}

.box4{
    position: absolute;
    bottom: 20;
    display: flex;
    /* flex-direction: row; */
    /* align-content: center; */
    align-items: flex-end;
}
.options label,
.options input{
	width:4em;
	padding:0.5em 1em;
}
.btn{
    bottom:; 20px;
    font-size: 20px;
    line-height: 0;
    padding: 20px;
    width: 100%;
    border-radius: 15px;
}

.hide {
	display: none;
}

#image{
    width: 100%;
    height: 70%;
}
  @media (max-width: 880px) {
    .main {
      flex-direction: column;
      justify-content: center;
    }

    span {
      font-size: clamp(0.8rem, 4vw, 1.5rem);
    }

    .cat {
      width: clamp(180px, 50%, 300px);
      height: clamp(180px, 50vw, 300px);
      margin: 0;
    }

    .icon2 {
      left: 50%;
      transform: translateX(-50%);
    }

    .tudo.forms {
      padding-top: 30px;
    }

    .submit {
      width: 64px;
    }
  }
  
  #biog{
    border-bottom: 1px solid #cecece;
    font-size: 18px;
    font-family: 'Wix Madefor Display', sans-serif;
  }
  
  .timeline{
    display: flex;
    flex-direction: column;
    margin: 15px;
  }

  #nomeprof2 {
    display: none;
  }
  
  .block{
      border: none;
      opacity: 1;
      background: transparent;
      outline: none;
      position: absolute;
  }

#message {
    transform: scale(0);
    transition: transform .3s ease;
    color: #000;
    bottom: 10px;
    width: 290px;
    font-size: 15px;
    position: absolute;
    text-align: center;
    margin-top: 15px;
}

.valid {
  color: green;
  margin: 0px;
}

.valid:before {
  position: relative;
  left: -35px;
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
  color: red;
  margin: 0px;
}

.invalid:before {
  position: relative;
  left: -35px;
}

h4{
    margin: 5px;
}
  @media (max-width: 600px) {
    .perfil {
      flex-direction: column;
      align-items: center;
    }
    .pic{
        object-fit: fill;
        width: 120px;
        height: 120px;
        margin-right: 20px;
        margin-left: 20px;
    }
    .cropped{
        width: clamp(90px, 50%, 160px);
    }
}
  minlenght {
    background: black;
  }
</style>

<body>
	<div class="mytabs">
		<input type="radio" id="tabfree" name="mytabs" checked="checked">
	  	<label for="tabfree" class="fas fa-info icon1 icone"></label>
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
	  	</div>
	  	<div class="tab"></div>
	  		<input type="radio" id="tabgold" name="mytabs">
	  		<label for="tabgold" class="fas fa-user-circle icon3 icone">
	    		<span id="nickname"></span>
	    		<a href="logout.php" class="out fas fa-sign-out-alt fa-rotate-180"></a>
	  		</label>
	  		<div class="tab" id="tab2">
	    			<div id="body">
	        			<div class="tudo">
	            				<div class="forms log">
	                			<h3 id="logon">Log in</h3>
	                				<div class="box">
	                    					<form action="login.php" method="POST" autocomplete="off">
	                        				<input id="email2" type='email' name="email2" placeholder="email" class="fname" onkeyup="othername()">
	                        					<div class="view">
	                            						<a class="forgot" style="color:blue;" onclick="myFunction23()">Forgot password?</a>
	                            						<input type="password" id="password2" class="test" name="password2" placeholder="password" onkeyup="passlength()">
	                            						<i class="fas fa-eye" id="togglePassword" style="margin-left: -50px; cursor: pointer; position: absolute; line-height: 3.3em; color: #202124b8;"></i>
	                        					</div>
	                        					<input id="submit2" type="submit">
	                    					</form>
	                    					<p class="text">don't have an account?<a href="#logon" class="signlink register" onclick="myFunction10()" onkeydown="return (event.keyCode!=9);">&nbsp;register</a></p>
	                				</div>
	            				</div>
	            				<div class="forms sign">
	                				<h3 id="logon">Sign up</h3>
	                				<form action="gabiru.php" name="logan" method="POST">
	                    					<input id="name" type="name" name="name" placeholder="name" autofocus required autocomplete="off">
	                    					<input id="email" type="email" placeholder="email" name="email" required autocomplete="off">
	                    					<input type="password" id="password" for="password" class="password" name="password" placeholder="password" minlength="8" onkeyup='check();'"^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$" onfocus="myFunction11()" required>
	                    					<input type="password" id="confirm_password" name="confirm_password" placeholder="confirm password" onkeyup='check();'>
	                    					<div id="message">
	                        					<p id="letter" class="invalid">A <b>lowercase</b>letter</p>
									<p id="capital" class="invalid">A <b>uppercase</b>letter</p>
									<p id="number" class="invalid">A <b>number</b></p>
									<p id="special" class="invalid">A <b>special</b>character</p>
									<p id="length" class="invalid">Minimum <b>8 characters</b></p>
								</div>
	                    					<input id="submit" type="submit" onclick="alert()">
	                				</form>
	                				<p class="text">do already have?<a href="#" class="loglink register" onclick="myFunction12()" onkeydown="return (event.keyCode!=9);">&nbsp;log in</a></p>
	            				</div>
	            				<div class="forms pass">
	                				<h3 id="logon">Reset Password</h3>
	                				<form action="" method="POST" autocomplete="off" id="recp">
	                    					<input id="email3" type="email" placeholder="email" name="email3" required autocomplete="off">
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
	                            					
									<input type="number" class="img-w" value="300" min="10000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000" max="1200"/>
								</div>	                        			
							</div>
	                        <!-- save btn -->
	                        <!-- download btn -->
	                    			</div>
	                		</main>
	            		</div>
	            		<div class="mainly">
	                		<div class="perfil">
	                    			<div class="pictures">
	                        			<div class="desc">
	                            				<div class="pictur">
	                                				<div class="profpic" onclick="myFunction22()">
	                                    <!--Aqui vai o php-->
	                                    					<img class="cropped" id="cropped" alt="">
	                                    					<form action="process_image.php" method="POST" style="position:absolute;">
	                                        					<input id="myinput" name="opaitaon" type="url" value="" style="display:none;">
	                                        					<button type="submit" id="salvar" style="display:none;">Salvar</button>
	                                    					</form>
	                                				</div>
	                                			<div id="popu2">
	                                    				<img id="cropped2" class="cropped2" alt="" style="width: clamp(50px, 70%, 500px);">
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
<script src="
https://cdn.jsdelivr.net/npm/nodemailer@6.9.4/lib/nodemailer.min.js
"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>
<script>

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
</script>
</body>

</html>
