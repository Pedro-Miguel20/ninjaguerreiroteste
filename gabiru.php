<?php 

require __DIR__ . "/datatabase.php";

$sql = "INSERT INTO ninjinha(Nome, Email, Hashi) 
        VALUES ('$name', '$email', '$hash_pass')";

$stmt = mysqli_stmt_init($conexao);

if ( ! mysqli_stmt_prepare($stmt, $sql)) {
 
    die(mysqli_error($conexao));
}

mysqli_stmt_bind_param($stmt, "sss", $name, $email, $hash);

mysqli_stmt_execute($stmt);

mysqli_close($conexao);

echo "Cadastro Salvo!";

?>
