<?php
namespace app\controllers;

use core\App;
use core\SessionUtils;

class HelloCtrl {
    public function action_hello() {
        // Pobranie z sesji informacji czy użytkownik jest zalogowany oraz jego nazwy
        $user_logged_in = SessionUtils::load('user_logged_in', true);
        $user_name = SessionUtils::load('user_name', true);
        $user_id = SessionUtils::load('user_id', true);

        // Domyślne wartości dla ról
        $user_is_admin = false;
        $user_is_office_worker = false;
        $user_is_workshop_worker = false;

        // Sprawdzenie ról użytkownika
        if ($user_logged_in && $user_id) {
            $db = App::getDB();

            $user_is_admin = $db->has("users_roles", [
                "[>]roles" => ["role_id" => "id_role"]
            ], [
                "users_roles.user_id" => $user_id,
                "roles.role_name" => "administrator"
            ]);

            $user_is_office_worker = $db->has("users_roles", [
                "[>]roles" => ["role_id" => "id_role"]
            ], [
                "users_roles.user_id" => $user_id,
                "roles.role_name" => "pracownik_biurowy"
            ]);

            $user_is_workshop_worker = $db->has("users_roles", [
                "[>]roles" => ["role_id" => "id_role"]
            ], [
                "users_roles.user_id" => $user_id,
                "roles.role_name" => "pracownik_warsztatowy"
            ]);
        }

        App::getSmarty()->assign('user_logged_in', $user_logged_in);
        App::getSmarty()->assign('user_name', $user_name);
        App::getSmarty()->assign('user_is_admin', $user_is_admin);
        App::getSmarty()->assign('user_is_office_worker', $user_is_office_worker);
        App::getSmarty()->assign('user_is_workshop_worker', $user_is_workshop_worker);

        App::getSmarty()->display('HelloView.tpl');
    }
}
