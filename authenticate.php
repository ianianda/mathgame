<?php
    session_start();

    if(isset($_SESSION['login']) && $_SESSION['login'] == 'true') {
	header('Location: index.php');
        }

    else if(!isset($_POST['email']) || $_POST['email'] !== "a@a.a") {
        header("Location: login.php?msg=Invalid%20login%20credentials.");
        }

    else if(!isset($_POST['password']) || $_POST['password'] !== "aaa") {
        header("Location: login.php?msg=Invalid%20login%20credentials.");
        }

     else {
        $_SESSION['login'] = 'true';
        header("Location: index.php");
        die();
    }
?>
