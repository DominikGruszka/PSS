<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\SessionUtils;

class VehiclesListCtrl {
    public function action_vehiclesList() {
        $user_logged_in = SessionUtils::load('user_logged_in', true);
        $user_name = SessionUtils::load('user_name', true);
        $user_id = SessionUtils::load('user_id', true);

        if (!$user_logged_in || !$user_id) {
            App::getMessages()->addMessage(new Message('Brak zalogowanego użytkownika. Lista pojazdów jest niedostępna.', Message::ERROR));
            App::getSmarty()->assign('vehicles', []);
            App::getSmarty()->display('VehiclesListView.tpl');
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['delete_vehicle_id'])) {
                $this->deleteVehicle();
            } elseif (isset($_POST['edit_vehicle_id'])) {
                $this->editVehicleForm();
            } elseif (isset($_POST['save_edit_vehicle_id'])) {
                $this->saveEditedVehicle();
            } elseif (isset($_POST['description'])) {
                $this->addReport($user_id);
            }
        }

        $this->showVehicles($user_id, $user_logged_in, $user_name);
        App::getSmarty()->display('VehiclesListView.tpl'); 
    }

    private function showVehicles($user_id, $user_logged_in, $user_name) {
        try {
            $vehicles = App::getDB()->select("vehicles", [
                "[>]reports" => ["id" => "vehicle_id"]
            ], [
                "vehicles.id",
                "vehicles.brand",
                "vehicles.model",
                "vehicles.production_year",
                "vehicles.vin",
                "reports.description",
                "reports.status",
                "reports.repair_amount"
            ], [
                "vehicles.user_id" => $user_id
            ]);

            App::getSmarty()->assign('vehicles', $vehicles);
            App::getSmarty()->assign('user_logged_in', $user_logged_in);
            App::getSmarty()->assign('user_name', $user_name);
        } catch (\PDOException $e) {
            App::getMessages()->addMessage(new Message('Wystąpił błąd podczas pobierania danych pojazdów.', Message::ERROR));
            if (App::getConf()->debug) {
                App::getMessages()->addMessage(new Message($e->getMessage(), Message::ERROR));
            }
        }
    }

    private function deleteVehicle() {
        $vehicle_id = getFromRequest('delete_vehicle_id');

        try {
            App::getDB()->delete("vehicles", ["id" => $vehicle_id]);
            App::getDB()->delete("reports", ["vehicle_id" => $vehicle_id]);
            App::getMessages()->addMessage(new Message('Pojazd został usunięty.', Message::INFO));
        } catch (\PDOException $e) {
            App::getMessages()->addMessage(new Message('Wystąpił błąd podczas usuwania pojazdu.', Message::ERROR));
            if (App::getConf()->debug) {
                App::getMessages()->addMessage(new Message($e->getMessage(), Message::ERROR));
            }
        }
    }

    private function editVehicleForm() {
        $vehicle_id = getFromRequest('edit_vehicle_id');

        try {
            $vehicle = App::getDB()->get("vehicles", "*", ["id" => $vehicle_id]);
            $report = App::getDB()->get("reports", "*", ["vehicle_id" => $vehicle_id]);

            App::getSmarty()->assign('edit_vehicle', $vehicle);
            App::getSmarty()->assign('edit_report', $report);
        } catch (\PDOException $e) {
            App::getMessages()->addMessage(new Message('Wystąpił błąd podczas ładowania danych pojazdu do edycji.', Message::ERROR));
        }
    }

    private function saveEditedVehicle() {
        $vehicle_id = getFromRequest('save_edit_vehicle_id');
        $brand = trim(getFromRequest('brand'));
        $model = trim(getFromRequest('model'));
        $production_year = trim(getFromRequest('production_year'));
        $vin = trim(getFromRequest('vin'));
        $description = trim(getFromRequest('description'));

        if (empty($brand) || empty($model) || empty($production_year) || empty($vin) || empty($description)) {
            App::getMessages()->addMessage(new Message('Wszystkie pola muszą być wypełnione.', Message::ERROR));
            return;
        }

        // Dodana walidacja
        if (!ctype_digit($production_year) || strlen($production_year) !== 4) {
            App::getMessages()->addMessage(new Message('Rok produkcji musi składać się z dokładnie 4 cyfr.', Message::ERROR));
            return;
        }

        if (!ctype_alnum($vin) || strlen($vin) !== 17) {
            App::getMessages()->addMessage(new Message('VIN musi składać się z dokładnie 17 znaków.', Message::ERROR));
            return;
        }

        try {
            App::getDB()->update("vehicles", [
                "brand" => $brand,
                "model" => $model,
                "production_year" => $production_year,
                "vin" => $vin
            ], ["id" => $vehicle_id]);

            // Sprawdzenie, czy istnieje raport dla tego pojazdu
            $reportExists = App::getDB()->has("reports", ["vehicle_id" => $vehicle_id]);

            if ($reportExists) {
                // Aktualizacja istniejącego raportu
                App::getDB()->update("reports", [
                    "description" => $description
                ], ["vehicle_id" => $vehicle_id]);
            } else {
                // Tworzenie nowego raportu
                App::getDB()->insert("reports", [
                    "vehicle_id" => $vehicle_id,
                    "description" => $description,
                    "status" => "Analizowanie zgłoszenia",
                    "created_at" => date("Y-m-d H:i:s")
                ]);
            }

            App::getMessages()->addMessage(new Message('Dane pojazdu i raport zostały zaktualizowane.', Message::INFO));
        } catch (\PDOException $e) {
            App::getMessages()->addMessage(new Message('Wystąpił błąd podczas aktualizacji danych pojazdu.', Message::ERROR));
            if (App::getConf()->debug) {
                App::getMessages()->addMessage(new Message($e->getMessage(), Message::ERROR));
            }
        }
    }

    private function addReport($user_id) {
        $vehicle_id = getFromRequest('vehicle_id');
        $description = trim(getFromRequest('description'));

        if (empty($description)) {
            App::getMessages()->addMessage(new Message('Opis usterki nie może być pusty.', Message::ERROR));
            return;
        }

        try {
            App::getDB()->insert("reports", [
                "vehicle_id" => $vehicle_id,
                "description" => $description,
                "status" => "Analizowanie zgłoszenia",
                "created_at" => date("Y-m-d H:i:s")
            ]);
            App::getMessages()->addMessage(new Message('Usterka została zgłoszona.', Message::INFO));
        } catch (\PDOException $e) {
            App::getMessages()->addMessage(new Message('Wystąpił błąd podczas zapisu zgłoszenia.', Message::ERROR));
            if (App::getConf()->debug) {
                App::getMessages()->addMessage(new Message($e->getMessage(), Message::ERROR));
            }
        }
    }
}
