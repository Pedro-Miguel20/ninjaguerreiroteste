<?php 
session_set_cookie_params(['httponly' => true]);
session_start();
    
$nm_sg = $_POST['nm_sg'];
$em_sg = $_POST['em_sg'];
$ps_sg = $_POST['ps_sg'];

if(empty($nm_sg)){
    die(header("Location: index.php"));
};

if(empty($em_sg)){
    die(header("Location: index.php"));
};

if(empty($ps_sg)){
    die(header("Location: index.php"));
};

require __DIR__ . "/env.php";

$ps_hs_lg = password_hash($ps_sg, PASSWORD_DEFAULT);

$em_sg_lower = strtolower($em_sg);

$sql_qy_sg = "INSERT INTO ninjinha(Nome, Email, Hashi, bio, img)VALUES(?,?,?,?,?)";

$stmt = mysqli_stmt_init($conn);

if ( ! mysqli_stmt_prepare($stmt, $sql_qy_sg)) {
 
    die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "sssss", $nm_sg, $em_sg_lower, $ps_hs_lg, $bio, $img);

mysqli_stmt_execute($stmt);

mysqli_close($conn);

unset($bio, $img);

header("Location: index.php");
exit;

?>
