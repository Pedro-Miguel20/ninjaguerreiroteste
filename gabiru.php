<?php 

require __DIR__ . "/database.php";

$name = $_POST["name"];
$email = $_POST["email"];
$hash_pass = $_POST["confirm_password"];

$hash_pass = password_hash(($hash_pass), PASSWORD_DEFAULT);

$sql = "INSERT INTO ninjinha(Nome, Email, Hashi) VALUES (?,?,?)";

$stmt = mysqli_stmt_init($conexao);

if ( ! mysqli_stmt_prepare($stmt, $sql)) {
 
    die(mysqli_error($conexao));
}

mysqli_stmt_bind_param($stmt, "sss", $name, $email, $hash_pass);

mysqli_stmt_execute($stmt);

mysqli_close($conexao);

print_r($_POST);

echo "Cadastro Salvo!";



?>
