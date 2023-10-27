<?php
require __DIR__ . "/index.php";
session_start();

$salsicha = $_SESSION['user_id'];
$opaitaon = $_POST["opaitaon"];
$_SESSION["link_db"] = $opaitaon;

require __DIR__ . "/database.php";

$sql_image = ("UPDATE ninjinha
    SET img = ?
    WHERE id = ?
    ");

$stmt = mysqli_stmt_init($conexao);

if ( ! mysqli_stmt_prepare($stmt, $sql_image)) {
 
    die(mysqli_error($conexao));
}

mysqli_stmt_bind_param($stmt, "si", $opaitaon, $salsicha);

mysqli_stmt_execute($stmt);

mysqli_close($conexao);

header("refresh: 0, url = index.php");

$update = true;
 
// Sem ele, ele envia informações infinitas
?>
