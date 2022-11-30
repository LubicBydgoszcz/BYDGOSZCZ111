<?php

use Steampixel\Route;

require_once('config.php');
require_once('class/User.class.php');

Route::add('/', function() {
    echo "strona główna";
});

Route::add('/login', function() {
    global $twig;
    $twig->display('login.html.twig');
});

Route::add('/register', function() {
    global $twig;
    $twig->display('register.html.twig');
});

Route::run('/BYDGOSZCZ111');
?>