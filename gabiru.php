/*    
        VERSÃO 1.0 
  $name = $_POST["name"];
  $email =  $_POST["email"];
  $password = $_POST["password"];
  var_dump($name, $email, $password); 
*/

<?php 

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
?>
