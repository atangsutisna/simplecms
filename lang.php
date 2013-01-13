<?php
header('Chace-control: private');
if (isset($_GET['lang'])) {
    $lang = $_GET['lang'];
    // register session and set cookie
    $_SESSION['lang'] = $lang;
    setcookie('lang', $lang, time() + (3600 * 24 * 30));
}

if (isset($_SESSION['lang'])){
    $lang = $_SESSION['lang'];
}
else if (isset($_COOKIE['lang'])){
    $lang = $_COOKIE['lang'];
}
else {
    $lang = 'english';
}
?>