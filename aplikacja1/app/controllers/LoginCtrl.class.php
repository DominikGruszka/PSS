<?php
namespace app\controllers;

use core\App;
use core\Message;
use core\SessionUtils;

class LoginCtrl {
    private $form;

    public function __construct() {
        $this->form = new \stdClass();
    }

    public function action_login() {
        $this->form->login = getFromRequest('login');
        $this->form->pass = getFromRequest('pass');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!$this->validateLoginForm()) {
                App::getSmarty()->assign('form', $this->form);
                App::getSmarty()->display('LoginView.tpl');
                return;
            }

            try {
                // Pobranie użytkownika z bazy
                $user = App::getDB()->get("users", "*", [
                    "login" => $this->form->login
                ]);

                if (!$user) {
                    App::getMessages()->addMessage(new Message('Nie ma takiego użytkownika.', Message::ERROR));
                    App::getSmarty()->assign('form', $this->form);
                    App::getSmarty()->display('LoginView.tpl');
                    return;
                }

                // Weryfikacja hasła
                if (!password_verify($this->form->pass, $user['password'])) {
                    App::getMessages()->addMessage(new Message('Nieprawidłowe hasło.', Message::ERROR));
                    App::getSmarty()->assign('form', $this->form);
                    App::getSmarty()->display('LoginView.tpl');
                    return;
                }

                // Zapis danych użytkownika w sesji
                SessionUtils::store('user_id', $user['id_users']);
                SessionUtils::store('user_name', $user['login']);
                SessionUtils::store('user_logged_in', true);

                // Pobierz rolę użytkownika
                try {
                    $user_role = App::getDB()->get("users_roles", [
                        "[>]roles" => ["role_id" => "id_role"]
                    ], "roles.role_name", [
                        "users_roles.user_id" => $user['id_users']
                    ]);

                    SessionUtils::store('user_role', $user_role ? $user_role : 'brak roli');
                } catch (\PDOException $e) {
                    App::getMessages()->addMessage(new Message('Błąd podczas przypisywania roli użytkownika.', Message::ERROR));
                }

                header("Location: hello");
                exit();
            } catch (\PDOException $e) {
                App::getMessages()->addMessage(new Message('Błąd podczas logowania. Spróbuj ponownie później.', Message::ERROR));
            }
        }

        // Wyświetl formularz logowania bez komunikatów o błędach
        App::getSmarty()->assign('form', $this->form);
        App::getSmarty()->display('LoginView.tpl');
    }

    private function validateLoginForm() {
        if (empty($this->form->login)) {
            App::getMessages()->addMessage(new Message('Login nie może być pusty.', Message::ERROR));
            return false;
        }

        if (empty($this->form->pass)) {
            App::getMessages()->addMessage(new Message('Hasło nie może być puste.', Message::ERROR));
            return false;
        }

        return true;
    }
}
