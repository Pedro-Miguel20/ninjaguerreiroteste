<?php
session_set_cookie_params(['httponly' => true]);
session_start();

session_destroy();

header("Location: index.php");

?>
