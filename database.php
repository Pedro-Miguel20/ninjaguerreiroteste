<?php

$servidor = "xxxxxxxxx";
$usuario = "xxxxxxxxxxx";
$senha = "xxxxxxxxxxx!";
$dbname = "xxxxxxxxxxx";

$conexao = mysqli_connect($servidor, $usuario, $senha, $dbname);

if(!$conexao){
die("Falha na conexão: " .mysqli_connect_error());
}

?>
