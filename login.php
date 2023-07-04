<?php

require __DIR__ . "/database.php";
include __DIR__ . "/index.php";

$sql01 = sprintf("SELECT * FROM ninjinha WHERE Email = '%s'", $conexao->real_escape_string($_POST["email2"]));
    
    $result = $conexao->query($sql01);
    
    $ninjinha = $result->fetch_assoc();

    if ($ninjinha) {

        if (password_verify($_POST["password2"], $ninjinha["Hashi"])) {
            
            $_SESSION["user_id"] = $ninjinha["id"];
            
            $is_available = false;
            
            exit;
            header("Location:index.php");
            }
        }
?>
