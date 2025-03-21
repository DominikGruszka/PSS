<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\SessionUtils;

class AjaxDemoCtrl {
    public function action_ajaxDemo() {
        try {
            // Pobranie listy użytkowników
            $users = App::getDB()->select("users", [
                "id_users",
                "login",
                "email",
                "lastname"
            ]);

            // Przekazanie użytkowników do widoku
            App::getSmarty()->assign('users', $users);
        } catch (\PDOException $e) {
            App::getMessages()->addMessage(new Message('Błąd pobierania użytkowników.', Message::ERROR));
        }

        App::getSmarty()->display('AjaxDemoView.tpl');
    }

    public function action_ajaxDeleteUser() {
        header('Content-Type: application/json'); // Ustawienie odpowiedzi JSON

        $user_id = getFromRequest('user_id');

        if (!$user_id) {
            echo json_encode(["success" => false, "error" => "Brak identyfikatora użytkownika."]);
            exit();
        }

        try {
            // Sprawdzenie, czy użytkownik istnieje
            $userExists = App::getDB()->has("users", ["id_users" => $user_id]);

            if (!$userExists) {
                echo json_encode(["success" => false, "error" => "Użytkownik nie istnieje."]);
                exit();
            }

            // Usunięcie użytkownika
            App::getDB()->delete("users", ["id_users" => $user_id]);

            // Sukces - zwracamy JSON
            echo json_encode(["success" => true]);
        } catch (\PDOException $e) {
            echo json_encode(["success" => false, "error" => "Błąd bazy danych: " . $e->getMessage()]);
        }
        exit();
    }
}
