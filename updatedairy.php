<?php

session_start();
include("connection.php");
$query = "UPDATE reg_users SET dairy='" . mysqli_real_escape_string($link, $_POST['dairy']) . "'WHERE id='" . $_SESSION['id'] . "' LIMIT 1 ";
mysqli_query($link, $query);
print_r($_SESSION);
?>
