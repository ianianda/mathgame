<?php
    session_start();
    $error = false;

    if(isset($_SESSION['login']) && $_SESSION['login'] == 'yes') {
	header('Location: index.php');
        }

    if(!isset($_POST['email']) || $_POST['email'] !== "a@a.a") {
        header("Location: login.php?msg=Invalid%20login%20credentials.");
        }

    if(!isset($_POST['password']) || $_POST['password'] !== "aaa") {
        header("Location: login.php?msg=Invalid%20login%20credentials.");
        }

     else if {
        $_SESSION['login'] = 'yes';
        header("Location: index.php");
        die();
    }
?>
