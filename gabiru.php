/*
        [VERSÃO 1.0] 
  $name = $_POST["name"];
  $email =  $_POST["email"];
  $password = $_POST["password"];
  var_dump($name, $email, $password); 

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

        [VERSÃO 3.0]
<?php 
$name = $_POST["name"]; 
$email = $_POST;["email"];
$password = $_POST["password"];
$servidor = "XXXXXXXX";
$usuario = "XXXXXXXX";
$senha = "XXXXXXXX";
$dbname = "XXXXXXXXX";
$conexao = mysqli_connect($servidor, $usuario, $senha, $dbname);
if(!$conexao){
die("Falha na conexão: " .mysqli_connect_error());
}
$sql = "INSERT INTO ninjinha(Nome, Email, Senha)
        VALUES (?, ?, ?)";
$stmt = mysqli_stmt_init($conexao);
if ( ! mysqli_stmt_prepare($stmt, $sql)) {
    die(mysqli_error($conexao));
}
mysqli_stmt_bind_param($stmt, "ssi", $name, $email, $password);
mysqli_stmt_execute($stmt);
mysqli_close($conexao);
echo "Cadastro Salvo!";
?>
*/

<?php



?>
