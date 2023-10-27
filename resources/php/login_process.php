<?php 
session_set_cookie_params(['httponly' => true]);
session_start();

$em_lg = $_POST['em_lg'];
$ps_lg = $_POST['ps_lg'];

require __DIR__ . "/env.php";

$em_lg_lower = password_hash($em_lg, PASSWORD_DEFAULT);

$sql_qy_lg = sprintf("SELECT * FROM ninjinha WHERE Email = '%s'",
$conn->real_escape_string($_POST["em_lg"]));

$result = $conn->query($sql_qy_lg);

$ninjinha = $result->fetch_assoc();

if ($ninjinha) {
    
    if (password_verify($_POST["ps_lg"], $ninjinha["Hashi"])) {
        
        $is_available = true;
        
        session_regenerate_id(true);
        
        $gabgame = (htmlspecialchars($ninjinha["Nome"]));
        
        $_SESSION["name_id"] = $gabgame;
        $_SESSION["user_id"] = $ninjinha["id"];
        $_SESSION["is_available"] = true;
        
        header('Location: /index.php');
        exit;
        }

    } else {
        
        $_SESSION['cred_error'] = true;
        header('Location: https://portfolioshared.com.br/');
    }
    
$_SESSION['cred_error'] = true;
echo '<script>history.back();</script>';
sleep(1);


?>
