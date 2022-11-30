<?php

use Steampixel\Route;

require_once('config.php');
require_once('class/User.class.php');

Route::add('/', function() {
    echo "strona główna";
});

Route::add('/login', function() {
    echo "strona logowania";
});

Route::add('/register', function() {
    echo "strona rejestracji";
});

Route::run('/BYDGOSZCZ111');
?>