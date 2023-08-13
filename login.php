<?php

session_set_cookie_params(['httponly' => true]);
session_start();

require __DIR__ . "/database.php";
    
    // include_once __DIR__ . "/index.php"; causador da mal renderização

    $email2 = $_POST["email2"];

    $email3 = strtolower($email2);
    
    $sql01 = sprintf("SELECT * FROM ninjinha WHERE Email = '%s'", 
    $conexao->real_escape_string($_POST["email2"]));
    
    $result = $conexao->query($sql01);
    
    $ninjinha = $result->fetch_assoc();
    
if ($ninjinha) {
    
    if (password_verify($_POST["password2"], $ninjinha["Hashi"])) {
        
        session_regenerate_id(true);
        
        $_SESSION["user_id"] = $ninjinha["id"];
        
        require __DIR__ . "/index.php";
        
        ob_start();
        $is_available = false;
        $gabgame = (htmlspecialchars($ninjinha["Nome"]));
        $_SESSION["name_id"] = $gabgame;
        $gabgame = $gabjogos;
        $trabay = ob_get_contents();
        
        header("Location: index.php");
        echo $trabay;
        ob_end_clean();
        exit;
        } 
        
    } else {
        
        header("Location: index.php");
        exit;
    }
    
header("Location: index.php");
exit;

?>
    
  
