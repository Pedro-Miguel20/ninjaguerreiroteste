<?php 

$name = $_POST["name"];
$email =  $_POST["email"];
$password = $_POST["password"];
//var_dump($name, $email, $password);
$servidor = localhost;
$usuario = root;
$senha = geralmente_nada/vazio;
$db = não_me_recordo;

$conexao = mysql_connect($servidor, $usuario, $senha, $db);

if(!$conexao){
die("Falha na conexão!" : mysql_connect_error());
}
mysql_close($sonexao);
