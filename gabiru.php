<?php 
$name = $_POST["name"];
$email = $_POST["email"];
$hash_pass = $_POST["confirm_password"];

print_r($_POST);

$hash_pass = password_hash(($hash_pass), PASSWORD_DEFAULT);

$servidor = "XXXXX";
$usuario = "XXXXXX";
$senha = "XXXXXX";
$dbname = "XXXXXXX";

$conexao = mysqli_connect($servidor, $usuario, $senha, $dbname);

if(!$conexao){
die("Falha na conexão: " .mysqli_connect_error());
}

$sql = sprintf("SELECT * FROM user
                    WHERE email = '%s'",
                   $mysqli->real_escape_string($_POST["email"]));
    
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
    
    if ($user) {
        
        if (password_verify($_POST["password"], $user["password_hash"])) {
            
            session_start();
            
            session_regenerate_id();

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
