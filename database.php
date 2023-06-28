<?php

$servidor = "localhost";
$usuario = "id20950902_ninjaguerreirocomdb";
$senha = "Ninja01!";
$dbname = "id20950902_ninjaguerreirosemdb";

$conexao = mysqli_connect($servidor, $usuario, $senha, $dbname);

if(!$conexao){
die("Falha na conexão: " .mysqli_connect_error());
}

?>
