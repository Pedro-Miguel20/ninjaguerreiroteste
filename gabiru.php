<?php 

session_start();

require __DIR__ . "/database.php";

$name = $_POST["name"];
$email = $_POST["email"];
$hash_pass = $_POST["confirm_password"];
$bio = "Escreva sobre você aqui...";

$hash_pass = password_hash(($hash_pass), PASSWORD_DEFAULT);

$sql = "INSERT INTO ninjinha(Nome, Email, Hashi, bio) VALUES (?,?,?,?)";

$stmt = mysqli_stmt_init($conexao);

if ( ! mysqli_stmt_prepare($stmt, $sql)) {
 
    die(mysqli_error($conexao));
}

mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $hash_pass, $bio);

mysqli_stmt_execute($stmt);

mysqli_close($conexao);

session_regenerate_id();

unset($bio);

header("Location: index.php");
exit;
