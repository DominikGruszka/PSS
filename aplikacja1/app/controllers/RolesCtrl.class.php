<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\SessionUtils;

class RolesCtrl {
    public function action_roles() {
        // Pobranie danych użytkownika
        $user_logged_in = SessionUtils::load('user_logged_in', true);
        $user_name = SessionUtils::load('user_name', true);
        $user_role = SessionUtils::load('user_role', true);

        // Sprawdzenie uprawnień
        if ($user_role !== 'administrator') {
            App::getMessages()->addMessage(new Message('Brak uprawnień do zarządzania rolami.', Message::ERROR));
            header("Location: hello");
            exit();
        }

        // Obsługa dodawania nowej roli
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['add_role'])) {
                $this->addRole();
            } elseif (isset($_POST['delete_role'])) {
                $this->deleteRole();
            }
        }

        try {
            // Pobranie listy ról
            $roles = App::getDB()->select("roles", [
                "id_role",
                "role_name",
                "created_at"
            ]);

            App::getSmarty()->assign('roles', $roles);
            App::getSmarty()->assign('user_logged_in', $user_logged_in);
            App::getSmarty()->assign('user_name', $user_name);
        } catch (\PDOException $e) {
            App::getMessages()->addMessage(new Message('Błąd podczas ładowania listy ról: ' . $e->getMessage(), Message::ERROR));
        }

        App::getSmarty()->display('RolesView.tpl');
    }

    private function addRole() {
        $role_name = trim(getFromRequest('role_name'));

        if (empty($role_name)) {
            App::getMessages()->addMessage(new Message('Nazwa roli nie może być pusta.', Message::ERROR));
            return;
        }

        try {
            // Dodanie nowej roli
            App::getDB()->insert("roles", [
                "role_name" => $role_name,
                "created_at" => date("Y-m-d H:i:s")
            ]);

            App::getMessages()->addMessage(new Message('Nowa rola została dodana pomyślnie.', Message::INFO));
        } catch (\PDOException $e) {
            App::getMessages()->addMessage(new Message('Błąd podczas dodawania nowej roli: ' . $e->getMessage(), Message::ERROR));
        }
    }

    private function deleteRole() {
        $role_id = getFromRequest('role_id');

        if (empty($role_id)) {
            App::getMessages()->addMessage(new Message('Nie wybrano roli do usunięcia.', Message::ERROR));
            return;
        }

        try {
            // Usunięcie roli
            App::getDB()->delete("roles", ["id_role" => $role_id]);

            App::getMessages()->addMessage(new Message('Rola została usunięta pomyślnie.', Message::INFO));
        } catch (\PDOException $e) {
            App::getMessages()->addMessage(new Message('Błąd podczas usuwania roli: ' . $e->getMessage(), Message::ERROR));
        }
    }
}
