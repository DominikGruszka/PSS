<?php

namespace app\controllers;

use core\App;
use core\Message;

class PasswordCtrl {
    public function action_passwordReset() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim(getFromRequest('email'));

            if (empty($email)) {
                App::getMessages()->addMessage(new Message('E-mail nie może być pusty.', Message::ERROR));
                return;
            }

            try {
                $user_exists = App::getDB()->has("users", ["email" => $email]);

                if ($user_exists) {
                    // Logika wysyłania linku resetującego hasło (przykład).
                    // Możesz użyć biblioteki do wysyłania e-maili.
                    App::getMessages()->addMessage(new Message('Wysłaliśmy link na podany e-mail.', Message::INFO));
                } else {
                    App::getMessages()->addMessage(new Message('Nie znaleziono użytkownika z podanym e-mailem.', Message::ERROR));
                }
            } catch (\PDOException $e) {
                App::getMessages()->addMessage(new Message('Błąd podczas wysyłania linku: ' . $e->getMessage(), Message::ERROR));
            }
        }

        App::getSmarty()->display('PasswordView.tpl');
    }
}
