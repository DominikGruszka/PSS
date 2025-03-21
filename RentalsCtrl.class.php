<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\SessionUtils;

class RentalsCtrl {
    public function action_rentals() {
        
      // Przekazanie danych o użytkowniku 
        $user_logged_in = SessionUtils::load('user_logged_in', true);
        $user_name = SessionUtils::load('user_name', true);

      // Przekazanie danych do widoku
        App::getSmarty()->assign('user_logged_in', $user_logged_in);
        App::getSmarty()->assign('user_name', $user_name);

        App::getSmarty()->display('RentalsView.tpl');
    }
}

