<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\SessionUtils;

class AjaxDemoCtrl {
    public function action_ajaxDemo() {
        $user_logged_in = SessionUtils::load('user_logged_in', true);
        $user_name = SessionUtils::load('user_name', true);

        App::getSmarty()->assign('user_logged_in', $user_logged_in);
        App::getSmarty()->assign('user_name', $user_name);

        try {
            $users = App::getDB()->select("users", [
                "id_users",
                "login",
                "email",
                "lastname"
            ]);

            App::getSmarty()->assign('users', $users);
        } catch (\PDOException $e) {
            App::getMessages()->addMessage(new Message('Błąd podczas ładowania użytkowników.', Message::ERROR));
        }

        App::getSmarty()->display('AjaxDemoView.tpl');
    }

    public function action_ajaxDeleteUser() {
        $user_id = getFromRequest('user_id');

        if (!$user_id) {
            echo json_encode(["status" => "error", "message" => "Nie podano ID użytkownika"]);
            exit();
        }

        try {
            App::getDB()->delete("users", ["id_users" => $user_id]);
            echo json_encode(["status" => "success", "message" => "Użytkownik został usunięty"]);
        } catch (\PDOException $e) {
            echo json_encode(["status" => "error", "message" => "Błąd podczas usuwania użytkownika"]);
        }

        exit();
    }
}

