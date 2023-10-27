<?php
session_set_cookie_params(['httponly' => true]);
session_start();

$molho = $_SESSION['user_id'];
$bios = $_POST['bio'];
$_SESSION['biologia'] = $_POST['bio']; //

require __DIR__ . "/database.php";

    $sqlupdate = ("UPDATE ninjinha
    SET bio = ?
    WHERE id = ?
    ");
    
    
    $stmt = mysqli_stmt_init($conexao);

    if ( ! mysqli_stmt_prepare($stmt, $sqlupdate)) {

        die(mysqli_error($conexao));
        }
        
    mysqli_stmt_bind_param($stmt, "si", $bios, $molho);
    
    mysqli_stmt_execute($stmt);
    
    mysqli_close($conexao);
    
    session_regenerate_id(true);
    
    var_dump($bios);
    
    header("Location: index.php");
    exit;

?>
