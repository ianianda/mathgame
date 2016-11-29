<?php
session_start();
session_destroy();
$_SESSION['login'] = NULL;
header("Location: login.php");
?>
