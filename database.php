<?php 
$name = $_POST["name"];
$email = $_POST["email"];
$hash_pass = $_POST["confirm_password"];

print_r($_POST);

$servidor = "XXXXX";
$usuario = "XXXXXX";
$senha = "XXXXXX";
$dbname = "XXXXXXX";

$conexao = mysqli_connect($servidor, $usuario, $senha, $dbname);

if(!$conexao){
die("Falha na conexão: " .mysqli_connect_error());
}
?>
