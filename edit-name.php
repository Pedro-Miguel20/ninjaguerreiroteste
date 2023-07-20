<?php

session_start();

$salsicha = $_SESSION['user_id'];
$textt = $_POST['textt'];

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
    ob_start();
    
    session_regenerate_id(true);
    
    $getses = ob_get_contents();
    
    header("Location: index.php");
    
    echo $getses;
    
    ob_end_clean();
?>
