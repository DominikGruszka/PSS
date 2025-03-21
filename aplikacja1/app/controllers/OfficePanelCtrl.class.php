<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\SessionUtils;

class OfficePanelCtrl {
    public function action_officePanel() {
        // Pobranie danych sesji użytkownika
        $user_logged_in = SessionUtils::load('user_logged_in', true);
        $user_name = SessionUtils::load('user_name', true);
        $user_role = SessionUtils::load('user_role', true);

        // Sprawdzenie roli użytkownika
        if ($user_role !== 'pracownik_biurowy') {
            App::getMessages()->addMessage(new Message('Brak dostępu do panelu biurowego.', Message::ERROR));
            header("Location: hello");
            exit();
        }

        // Przekazanie danych do widoku
        App::getSmarty()->assign('user_logged_in', $user_logged_in);
        App::getSmarty()->assign('user_name', $user_name);

        App::getSmarty()->display('OfficePanelView.tpl');
    }
}
