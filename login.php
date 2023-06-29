<?php

require __DIR__ . "/database.php";
    
$sql01 = sprintf("SELECT * FROM ninjinha WHERE Email = '%s'", $conexao->real_escape_string($_POST["email2"]));
    
    $result = $conexao->query($sql01);
    
    $ninjinha = $result->fetch_assoc();
    
    if ($nijinha) {
        
        if (password_verify($_POST["password2"], $ninjinha["Hashi"])) {
            
            session_start();
            
            session_regenerate_id();
            
            $_SESSION["user_id"] = $ninjinha["id"];
            
            header("Location: home.php");
            exit;
        }
    }

?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
</body>
</html>
