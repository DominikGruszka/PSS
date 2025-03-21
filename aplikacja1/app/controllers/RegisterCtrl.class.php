<?php

namespace app\controllers;

use app\forms\RegisterForm;
use core\App;
use core\Message;
use core\SessionUtils;

class RegisterCtrl {
    private $form;

    public function __construct() {
        $this->form = new RegisterForm();
    }

    public function validate() {
        $hasErrors = false;

        if (empty($this->form->login)) {
            App::getMessages()->addMessage(new Message('Login nie może być pusty', Message::ERROR));
            $hasErrors = true;
        } elseif (strlen($this->form->login) < 5) {
            App::getMessages()->addMessage(new Message('Login musi mieć co najmniej 5 znaków', Message::ERROR));
            $hasErrors = true;
        }

        if (empty($this->form->password)) {
            App::getMessages()->addMessage(new Message('Hasło nie może być puste', Message::ERROR));
            $hasErrors = true;
        } elseif (strlen($this->form->password) < 8) {
            App::getMessages()->addMessage(new Message('Hasło musi mieć co najmniej 8 znaków', Message::ERROR));
            $hasErrors = true;
        }

        if (empty($this->form->password2)) {
            App::getMessages()->addMessage(new Message('Powtórzenie hasła nie może być puste', Message::ERROR));
            $hasErrors = true;
        }

        if ($this->form->password !== $this->form->password2) {
            App::getMessages()->addMessage(new Message('Hasła muszą być takie same', Message::ERROR));
            $hasErrors = true;
        }

        if (empty($this->form->email)) {
            App::getMessages()->addMessage(new Message('Email nie może być pusty', Message::ERROR));
            $hasErrors = true;
        }

        if (empty($this->form->lastname)) {
            App::getMessages()->addMessage(new Message('Nazwisko nie może być puste', Message::ERROR));
            $hasErrors = true;
        }

        if (empty($this->form->phone)) {
            App::getMessages()->addMessage(new Message('Numer telefonu nie może być pusty', Message::ERROR));
            $hasErrors = true;
        } elseif (!ctype_digit($this->form->phone) || strlen($this->form->phone) !== 9) {
            App::getMessages()->addMessage(new Message('Numer telefonu musi składać się z dokładnie 9 cyfr.', Message::ERROR));
            $hasErrors = true;
        }

        return !$hasErrors;
    }

    public function action_register() {
        $this->form->login = getFromRequest('login');
        $this->form->password = getFromRequest('password');
        $this->form->password2 = getFromRequest('password_repeat');
        $this->form->email = getFromRequest('email');
        $this->form->lastname = getFromRequest('lastname');
        $this->form->phone = getFromRequest('phone');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($this->validate()) {
                try {
                    $db = App::getDB();
                    $existingUser = $db->get("users", ["login"], [
                        "login" => $this->form->login
                    ]);

                    if ($existingUser) {
                        App::getMessages()->addMessage(new Message('Użytkownik o tym loginie już istnieje', Message::ERROR));
                        $this->generateView();
                        return;
                    }

                    // Haszowanie hasła
                    $hashedPassword = password_hash($this->form->password, PASSWORD_BCRYPT);

                    $db->insert("users", [
                        "login" => $this->form->login,
                        "password" => $hashedPassword, 
                        "email" => $this->form->email,
                        "lastname" => $this->form->lastname,
                        "phone" => $this->form->phone,
                        "created_at" => date("Y-m-d H:i:s"),
                    ]);

                    // Zapisanie user_id do sesji
                    SessionUtils::store('user_id', $db->id());
                    SessionUtils::store('user_logged_in', true);
                    SessionUtils::store('user_name', $this->form->login);

                    App::getMessages()->addMessage(new Message('Konto zostało utworzone pomyślnie.', Message::INFO));
                    header("Location: hello");
                    exit();
                } catch (\PDOException $e) {
                    App::getMessages()->addMessage(new Message('Błąd przy próbie zapisu do bazy danych.', Message::ERROR));
                }
            }
        }

        $this->generateView();
    }

    public function generateView() {
        App::getSmarty()->assign('form', $this->form);
        App::getSmarty()->display('RegisterView.tpl');
    }
}
