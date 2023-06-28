<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    require __DIR__ . "/database.php";
    
    $sql03 = "SELECT * FROM ninjinha
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $conexao->query($sql);
    
    $ninjinha = $result->fetch_assoc();
}

?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
    
    <h1>Home</h1>
    
    <?php if (isset($ninjinha)): ?>
        
        <p>Hello <?= htmlspecialchars($ninjinha["name"]) ?></p>
        
        <p><a href="logout.php">Log out</a></p>
        
    <?php else: ?>
        
        <p><a href="login.php">Log in</a> or <a href="signup.html">sign up</a></p>
        
    <?php endif; ?>
    
</body>
</html>


