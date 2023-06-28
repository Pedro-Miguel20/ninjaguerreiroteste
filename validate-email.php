<?php

require __DIR__ .  "/database.php";

$sql0 = sprintf("SELECT * FROM ninjinha
                WHERE Email = '%s'",
                $conexao->real_escape_string($_GET["email"]));
                
$result = $conexao->query($sql0);

$is_available = $result->num_rows === 0;

header("Content-Type: application/json");

echo json_encode(["available" => $is_available]);

?>
