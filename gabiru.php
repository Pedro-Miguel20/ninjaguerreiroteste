<?php 
session_set_cookie_params(['httponly' => true]);
session_start();

require __DIR__ . "/database.php";

$name = $_POST["name"];
$email = $_POST["email"];
$hash_pass = $_POST["confirm_password"];
$bio = "Escreva sobre você aqui...";
$img = "...";

if(empty($name)){
    die(header("Location: index.php"));
};

if(empty($email)){
    die(header("Location: index.php"));
};

if(empty($hash_pass)){
    die(header("Location: index.php"));
};

$email_lower = strtolower($email);

$hash_pass = password_hash(($hash_pass), PASSWORD_DEFAULT);

$sql = "INSERT INTO ninjinha(Nome, Email, Hashi, bio, img) VALUES (?,?,?,?,?)";

$stmt = mysqli_stmt_init($conexao);

if ( ! mysqli_stmt_prepare($stmt, $sql)) {
 
    die(mysqli_error($conexao));
}

mysqli_stmt_bind_param($stmt, "sssss", $name, $email_lower, $hash_pass, $bio, $img);

mysqli_stmt_execute($stmt);

mysqli_close($conexao);

unset($bio, $img);

header("Location: index.php");
exit;
