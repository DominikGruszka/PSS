<?php
namespace app\controllers;

use core\App;
use core\SessionUtils;

class LogoutCtrl {
 public function action_logout() {
     
   // Niszczenie sesji, aby wylogować użytkownika
    SessionUtils::store('user_logged_in', false); 
    session_destroy(); 

    header("Location: hello");
    exit();
}
}

