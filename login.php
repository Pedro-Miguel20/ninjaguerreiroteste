<?php

require __DIR__ . "/database.php";
    
    // include_once __DIR__ . "/index.php"; causador da mal renderização
    
    $sql01 = sprintf("SELECT * FROM ninjinha WHERE Email = '%s'", 
    $conexao->real_escape_string($_POST["email2"]));
    
    $result = $conexao->query($sql01);
    
    $ninjinha = $result->fetch_assoc();

if ($ninjinha) {
        
        if (password_verify($_POST["password2"], $ninjinha["Hashi"])) {
            
            $_SESSION["user_id"] = $ninjinha["id"];
            
            include_once __DIR__ . "/index.php";
            
            if ( ! isset($_SESSION["user_id"])) {
            session_regenerate_id(true);
            }
            
            ob_start();
            $is_available = false;
            $gabgame = (htmlspecialchars($ninjinha["Nome"]));
            $trabay = ob_get_contents();
            
            header("Location: index.php");
            echo $trabay;
            ob_end_clean();
            exit;
            
            }
        }
    
?>
    
  
