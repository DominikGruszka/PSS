<?php
require_once 'init.php';
use core\App;
header("Location: ". App::getConf()->app_url);
$user_logged_in = SessionUtils::load('user_logged_in', true);
$user_name = SessionUtils::load('user_name', true);

// Przekazanie danych do wszystkich widoków by użytkownik był zalogowany na stronie do momentu samodzielnego wylogowania się 
App::getSmarty()->assign('user_logged_in', $user_logged_in);
App::getSmarty()->assign('user_name', $user_name);