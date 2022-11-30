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

Route::add('/login', function() {
    global $twig;
    if(isset($_REQUEST['login']) && isset($_REQUEST['password'])) {
        $user = new User($_REQUEST['login'], $_REQUEST['password']);
        if($user->login()) {
            $twig->display('message.html.twig', ['message' => "Zalogowano pomyślnie użytkownika"]);
        } else {
            $twig->display('login.html.twig', ['message' => "Błędny login lub hasło!"]);
        }
    }
    else {
        die("Nie otrzymano danych");
    }
}, 'post');

Route::add('/register', function() {
    global $twig;
    $twig->display('register.html.twig');
});

Route::add('/register', function() {
    global $twig;
    if(isset($_REQUEST['login']) && isset($_REQUEST['password'])) {
        if((empty($_REQUEST['login'])) || empty($_REQUEST['password']) || empty($_REQUEST['firstName']) || empty($_REQUEST['lastName'])) {
            $twig->display('register.html.twig', ['message' => "Nie podano wymaganej wartości"]);
            exit();
        }
        $user = new User($_REQUEST['login'], $_REQUEST['password']);
        $user->setFirstName($_REQUEST['firstName']);
        $user->setLastName($_REQUEST['lastName']);
        if($user->register()) {
            $twig->display('message.html.twig', ['message' => "Zarejestrowano poprawnie"]);
        } else {
            $twig->display('register.html.twig', ['message' => "Błąd w rejestracji użytkownika!"]);
        }
    }
    else {
        die("Nie otrzymano danych");
    }
}, 'post');

Route::run('/BYDGOSZCZ111');
?>