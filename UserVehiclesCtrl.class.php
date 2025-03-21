<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\SessionUtils;

class UserVehiclesCtrl {
    public function action_userVehicles() {
        // Pobranie danych sesji
        $user_logged_in = SessionUtils::load('user_logged_in', true);
        $user_name = SessionUtils::load('user_name', true);
        $user_role = SessionUtils::load('user_role', true);

        // Przekazanie danych do widoku
        $user_is_admin = ($user_role === 'administrator');
        App::getSmarty()->assign('user_logged_in', $user_logged_in);
        App::getSmarty()->assign('user_name', $user_name);
        App::getSmarty()->assign('user_is_admin', $user_is_admin);

        $user_id = getFromRequest('user_id');
        if (!$user_id) {
            App::getMessages()->addMessage(new Message('Nie wybrano użytkownika.', Message::ERROR));
            header("Location: adminPanel");
            exit();
        }

        $edit_vehicle = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['delete_vehicle_id'])) {
                $this->deleteVehicle();
            } elseif (isset($_POST['edit_vehicle_id'])) {
                $edit_vehicle = $this->editVehicleForm();
            } elseif (isset($_POST['save_edit_vehicle_id'])) {
                $this->saveEditedVehicle();
            }
        }

        // Wyświetlenie pojazdów użytkownika
        $this->showVehicles($user_id, $edit_vehicle);
    }

    private function showVehicles($user_id, $edit_vehicle) {
        try {
            $vehicles = App::getDB()->select("vehicles", [
                "id",
                "brand",
                "model",
                "production_year",
                "vin",
                "created_at"
            ], [
                "user_id" => $user_id
            ]);

            $viewed_user = App::getDB()->get("users", "login", [
                "id_users" => $user_id
            ]);

            if (!$viewed_user) {
                App::getMessages()->addMessage(new Message('Nie znaleziono użytkownika.', Message::ERROR));
                header("Location: adminPanel");
                exit();
            }

            App::getSmarty()->assign('vehicles', $vehicles);
            App::getSmarty()->assign('viewed_user', $viewed_user);
            App::getSmarty()->assign('edit_vehicle', $edit_vehicle);
            App::getSmarty()->assign('user_id', $user_id);
            App::getSmarty()->display('UserVehiclesView.tpl');
        } catch (\PDOException $e) {
            App::getMessages()->addMessage(new Message('Wystąpił błąd podczas ładowania danych pojazdów.', Message::ERROR));
            header("Location: adminPanel");
        }
    }

    private function deleteVehicle() {
        $vehicle_id = getFromRequest('delete_vehicle_id');

        if (!$vehicle_id) {
            App::getMessages()->addMessage(new Message('Nie wybrano pojazdu do usunięcia.', Message::ERROR));
            return;
        }

        try {
            App::getDB()->delete("vehicles", ["id" => $vehicle_id]);
            App::getMessages()->addMessage(new Message('Pojazd został usunięty.', Message::INFO));
        } catch (\PDOException $e) {
            App::getMessages()->addMessage(new Message('Wystąpił błąd podczas usuwania pojazdu.', Message::ERROR));
        }
    }

    private function editVehicleForm() {
        $vehicle_id = getFromRequest('edit_vehicle_id');

        try {
            return App::getDB()->get("vehicles", "*", ["id" => $vehicle_id]);
        } catch (\PDOException $e) {
            App::getMessages()->addMessage(new Message('Wystąpił błąd podczas ładowania danych pojazdu do edycji.', Message::ERROR));
            return null;
        }
    }

    private function saveEditedVehicle() {
        $vehicle_id = getFromRequest('save_edit_vehicle_id');
        $brand = trim(getFromRequest('brand'));
        $model = trim(getFromRequest('model'));
        $production_year = trim(getFromRequest('production_year'));
        $vin = trim(getFromRequest('vin'));

        if (empty($brand) || empty($model) || empty($production_year) || empty($vin)) {
            App::getMessages()->addMessage(new Message('Wszystkie pola muszą być wypełnione.', Message::ERROR));
            return;
        }

        // Walidacja roku produkcji (4 cyfry)
        if (!preg_match('/^\d{4}$/', $production_year)) {
            App::getMessages()->addMessage(new Message('Rok produkcji musi składać się z dokładnie 4 cyfr.', Message::ERROR));
            return;
        }

        // Walidacja numeru VIN (17 znaków)
        if (strlen($vin) !== 17) {
            App::getMessages()->addMessage(new Message('Numer VIN musi składać się z dokładnie 17 znaków.', Message::ERROR));
            return;
        }

        try {
            App::getDB()->update("vehicles", [
                "brand" => $brand,
                "model" => $model,
                "production_year" => $production_year,
                "vin" => $vin
            ], [
                "id" => $vehicle_id
            ]);

            App::getMessages()->addMessage(new Message('Dane pojazdu zostały zaktualizowane.', Message::INFO));
        } catch (\PDOException $e) {
            App::getMessages()->addMessage(new Message('Wystąpił błąd podczas aktualizacji danych pojazdu.', Message::ERROR));
        }
    }
}
