<?php

if ($_POST && !isset($_SESSION['logged']))
{
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $user = new User();
    
    if ($user->checkUser($username, $password)){
        $_SESSION['is_admin'] = true;
        $_SESSION['current_user'] = $username;
        header("location:index.php");    
    }
    else {
        echo error("Username and Password doen't match..");
    }
}