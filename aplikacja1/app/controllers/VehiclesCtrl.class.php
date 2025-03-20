<?php
namespace app\controllers;

use core\App;
use core\Message;
use core\SessionUtils;

class VehiclesCtrl {
    private $form;

    public function __construct() {
        $this->form = new \app\forms\VehiclesForm();
    }

    public function action_vehicles() {
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

        if (!$user_logged_in) {
            App::getMessages()->addMessage(new Message('Musisz być zalogowany, aby zarejestrować pojazd.', Message::ERROR));
            header("Location: login");
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->handleVehicleRegistration();
        }

        App::getSmarty()->assign('user_logged_in', $user_logged_in);
        App::getSmarty()->assign('user_name', $user_name);
        App::getSmarty()->assign('user_is_admin', $user_is_admin);
        App::getSmarty()->assign('user_is_office_worker', $user_is_office_worker);
        App::getSmarty()->assign('user_is_workshop_worker', $user_is_workshop_worker);
        App::getSmarty()->assign('form', $this->form);

        App::getSmarty()->display('VehiclesView.tpl');
    }

    private function handleVehicleRegistration() {
        $this->form->brand = trim(getFromRequest('brand'));
        $this->form->model = trim(getFromRequest('model'));
        $this->form->production_year = trim(getFromRequest('production_year'));
        $this->form->vin = trim(getFromRequest('vin'));

        if (!$this->validateVehicleData()) {
            return;
        }

        try {
            $user_id = SessionUtils::load('user_id', true);

            App::getDB()->insert("vehicles", [
                "user_id" => $user_id,
                "brand" => $this->form->brand,
                "model" => $this->form->model,
                "production_year" => $this->form->production_year,
                "vin" => $this->form->vin,
                "created_at" => date("Y-m-d H:i:s")
            ]);

            App::getMessages()->addMessage(new Message('Pojazd został zapisany pomyślnie.', Message::INFO));
            header("Location: vehiclesList");
            exit();
        } catch (\PDOException $e) {
            App::getMessages()->addMessage(new Message('Wystąpił błąd podczas zapisu pojazdu.', Message::ERROR));
        }
    }

    private function validateVehicleData() {
        $hasErrors = false;

        if (empty($this->form->brand)) {
            App::getMessages()->addMessage(new Message('Marka pojazdu jest wymagana.', Message::ERROR));
            $hasErrors = true;
        }
        if (empty($this->form->model)) {
            App::getMessages()->addMessage(new Message('Model pojazdu jest wymagany.', Message::ERROR));
            $hasErrors = true;
        }
        if (empty($this->form->production_year) || !is_numeric($this->form->production_year) || strlen($this->form->production_year) != 4) {
            App::getMessages()->addMessage(new Message('Rok produkcji musi być poprawnym rokiem (4 cyfry).', Message::ERROR));
            $hasErrors = true;
        }
        if (empty($this->form->vin) || strlen($this->form->vin) != 17) {
            App::getMessages()->addMessage(new Message('Numer VIN musi mieć dokładnie 17 znaków.', Message::ERROR));
            $hasErrors = true;
        }

        return !$hasErrors;
    }
}
