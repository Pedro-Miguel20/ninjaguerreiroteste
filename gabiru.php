/*
        [VERSÃO 1.0] 
  $name = $_POST["name"];
  $email =  $_POST["email"];
  $password = $_POST["password"];
  var_dump($name, $email, $password); 
        /[VERSÃO 1.0] 
*/
/*
        [VERSÃO 2.0]
$servidor = "XXXXXXX"; // Servidor do PhpMyAdM;
$usuario = "XXXXXX"; // Usuário do seu PhpMyAdm;
$senha = "XXXXXX"; // Senha do seu Usuário;
$dbname = "XXXXXXXX"; // Nome do Banco de Dados;

$conexao = mysqli_connect($servidor, $usuario, $senha, $dbname); // Conexão feita apartir da função "mysqli_connect";

echo "<span style='color:green;'>Conexão Estabelecida!</span>";

if(!$conexao){
die("Falha na conexão: " .mysqli_connect_error()); // Caso haja erro no servidor, retornar o nome do erro;
}

mysqli_close($conexao);
        /[VERSÃO 2.0]
*/

<?php 

$servidor = "XXXXXX";
$usuario = "XXXXXXX";
$senha = "XXXXXX";
$dbname = "XXXXXXXX";

$conexao = mysqli_connect($servidor, $usuario, $senha, $dbname);

if(!$conexao){
die("Falha na conexão: " .mysqli_connect_error());
}

mysqli_close($conexao);

/*

$sql = "INSERT INTO ninjinha(Name, E-mail, Senha)
        VALUES (?, ?, ?, ?)";

$stmt = mysqli_stmt_init($conexao);

if ( ! mysqli_stmt_prepare($stmt, $sql)) {
 
    die(mysqli_error($conexao));
}

mysqli_stmt_bind_param($stmt, "ssii",
                       $name,
                       $message,
                       $priority,
                       $type);

mysqli_stmt_execute($stmt);

echo "Record saved.";
*/

?>
