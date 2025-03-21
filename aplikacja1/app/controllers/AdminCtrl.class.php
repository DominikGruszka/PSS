<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\SessionUtils;

class AdminCtrl {
    public function action_adminPanel() {
        // Pobranie danych sesji
        $user_logged_in = SessionUtils::load('user_logged_in', true);
        $user_name = SessionUtils::load('user_name', true);
        $user_role = SessionUtils::load('user_role', true);

        // Sprawdzenie uprawnień administratora
        if (!$user_logged_in || $user_role !== 'administrator') {
            App::getMessages()->addMessage(new Message('Brak uprawnień do panelu administratora.', Message::ERROR));
            header("Location: hello");
            exit();
        }

        // Przekazanie zmiennych sesji do widoku
        App::getSmarty()->assign('user_logged_in', $user_logged_in);
        App::getSmarty()->assign('user_name', $user_name);
        App::getSmarty()->assign('user_is_admin', $user_role === 'administrator');

        // Pobranie ról i filtrowanie
        $selected_role = getFromRequest('role_filter');
        App::getSmarty()->assign('selected_role', $selected_role);

        try {
            // Pobranie ról do wyboru
            $roles = App::getDB()->select("roles", ["id_role", "role_name", "status"], [
                "status" => "aktywny"
            ]);

            // Filtrowanie użytkowników według wybranej roli
            $users_query = [
                "[>]users_roles" => ["id_users" => "user_id"],
                "[>]roles" => ["users_roles.role_id" => "id_role"]
            ];

            $users_columns = [
                "users.id_users",
                "users.login",
                "users.email",
                "users.lastname",
                "roles.role_name",
                "users_roles.id(user_role_id)",
                "users_roles.created_at"
            ];

            if (!empty($selected_role)) {
                $users_where = ["roles.role_name" => $selected_role];
            } else {
                $users_where = [];
            }

            $users = App::getDB()->select("users", $users_query, $users_columns, $users_where);

            App::getSmarty()->assign('users', $users);
            App::getSmarty()->assign('roles', $roles);
        } catch (\PDOException $e) {
            App::getMessages()->addMessage(new Message('Wystąpił błąd podczas ładowania danych użytkowników.', Message::ERROR));
        }

        App::getSmarty()->display('AdminView.tpl');
    }

    public function action_assignRole() {
        $user_id = getFromRequest('user_id');
        $role_id = getFromRequest('role_id');

        if (!$user_id || !$role_id) {
            App::getMessages()->addMessage(new Message('Nie wybrano użytkownika lub roli.', Message::ERROR));
            header("Location: adminPanel");
            exit();
        }

        try {
            // Sprawdzenie, czy rola jest już przypisana
            $exists = App::getDB()->has("users_roles", [
                "user_id" => $user_id,
                "role_id" => $role_id
            ]);

            if ($exists) {
                App::getMessages()->addMessage(new Message('Użytkownik już posiada tę rolę.', Message::WARNING));
            } else {
                // Przypisanie roli
                App::getDB()->insert("users_roles", [
                    "user_id" => $user_id,
                    "role_id" => $role_id,
                    "created_at" => date("Y-m-d H:i:s")
                ]);

                App::getMessages()->addMessage(new Message('Rola została przypisana użytkownikowi.', Message::INFO));
            }
        } catch (\PDOException $e) {
            App::getMessages()->addMessage(new Message('Wystąpił błąd podczas przypisywania roli: ' . $e->getMessage(), Message::ERROR));
        }

        header("Location: adminPanel");
        exit();
    }

    public function action_removeRole() {
        $user_role_id = getFromRequest('user_role_id');

        if (!$user_role_id) {
            App::getMessages()->addMessage(new Message('Nie wybrano relacji użytkownika i roli do usunięcia.', Message::ERROR));
            header("Location: adminPanel");
            exit();
        }

        try {
            App::getDB()->delete("users_roles", [
                "id" => $user_role_id
            ]);

            App::getMessages()->addMessage(new Message('Rola została usunięta.', Message::INFO));
        } catch (\PDOException $e) {
            App::getMessages()->addMessage(new Message('Wystąpił błąd podczas usuwania roli: ' . $e->getMessage(), Message::ERROR));
        }

        header("Location: adminPanel");
        exit();
    }

    public function action_deleteUser() {
        $user_id = getFromRequest('user_id');

        if (!$user_id) {
            App::getMessages()->addMessage(new Message('Nie podano użytkownika do usunięcia.', Message::ERROR));
            header("Location: adminPanel");
            exit();
        }

        try {
            App::getDB()->delete("users", [
                "id_users" => $user_id
            ]);

            App::getMessages()->addMessage(new Message('Użytkownik został usunięty.', Message::INFO));
        } catch (\PDOException $e) {
            App::getMessages()->addMessage(new Message('Wystąpił błąd podczas usuwania użytkownika.', Message::ERROR));
        }

        header("Location: adminPanel");
        exit();
    }
}
