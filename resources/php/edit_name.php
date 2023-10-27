<?php
session_set_cookie_params(['httponly' => true]);
session_start();

$salsicha = $_SESSION['user_id'];
$textt = $_POST['textt'];
$nome = $_SESSION["name_id"]; //


require __DIR__ . "/database.php";

    $sqlupdate = ("UPDATE ninjinha
    SET Nome = ?
    WHERE id = ?
    ");
    
    $stmt = mysqli_stmt_init($conexao);

    if ( ! mysqli_stmt_prepare($stmt, $sqlupdate)) {

        die(mysqli_error($conexao));
        }
        
    mysqli_stmt_bind_param($stmt, "si", $textt, $salsicha);
    
    mysqli_stmt_execute($stmt);
    
    mysqli_close($conexao);
    
    header("Location: index.php");
    exit;
?>
