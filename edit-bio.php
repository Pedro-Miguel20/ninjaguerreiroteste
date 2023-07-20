<?php

session_start();

$molho = $_SESSION['user_id'];
$bios = $_POST['bio'];

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
    ob_start();
    
    session_regenerate_id(true);
    
    $getsess = ob_get_contents();
    
    header("Location: index.php");
    
    echo $getsess;
    
    ob_end_clean();
?>
