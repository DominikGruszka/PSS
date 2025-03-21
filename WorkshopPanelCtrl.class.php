<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\SessionUtils;

class WorkshopPanelCtrl {
    public function action_workshopPanel() {
        $user_logged_in = SessionUtils::load('user_logged_in', true);
        $user_name = SessionUtils::load('user_name', true);
        $user_role = SessionUtils::load('user_role', true);

        if ($user_role !== 'pracownik_warsztatowy') {
            App::getMessages()->addMessage(new Message('Brak dostępu do panelu warsztatowego.', Message::ERROR));
            header("Location: hello");
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['update_status'])) {
                $this->updateStatus();
            } elseif (isset($_POST['edit_vehicle_id'])) {
                $this->startEditingVehicle();
            } elseif (isset($_POST['save_vehicle_id'])) {
                $this->saveVehicleChanges();
            }
        }

        $this->loadVehiclesWithReports($user_logged_in, $user_name);
    }

    private function loadVehiclesWithReports($user_logged_in, $user_name) {
        try {
            $vehicles_with_reports = App::getDB()->select("vehicles", [
                "[>]reports" => ["id" => "vehicle_id"]
            ], [
                "vehicles.id(vehicle_id)",
                "vehicles.brand",
                "vehicles.model",
                "vehicles.production_year",
                "vehicles.vin",
                "reports.id_reports(report_id)",
                "reports.description",
                "reports.status(report_status)",
                "reports.created_at(report_created_at)"
            ], [
                "ORDER" => ["reports.created_at" => "DESC"]
            ]);

            App::getSmarty()->assign('user_logged_in', $user_logged_in);
            App::getSmarty()->assign('user_name', $user_name);
            App::getSmarty()->assign('vehicles_with_reports', $vehicles_with_reports);
            App::getSmarty()->assign('edit_vehicle', SessionUtils::load('edit_vehicle', true));
        } catch (\PDOException $e) {
            App::getMessages()->addMessage(new Message('Błąd podczas ładowania danych pojazdów i raportów.', Message::ERROR));
            if (App::getConf()->debug) {
                App::getMessages()->addMessage(new Message($e->getMessage(), Message::ERROR));
            }
        }

        App::getSmarty()->display('WorkshopPanelView.tpl');
    }

    private function updateStatus() {
        $report_id = getFromRequest('report_id');
        $status = trim(getFromRequest('status')[$report_id] ?? '');

        if (!$report_id || empty($status)) {
            App::getMessages()->addMessage(new Message('Niepoprawne dane statusu zgłoszenia.', Message::ERROR));
            return;
        }

        try {
            App::getDB()->update("reports", [
                "status" => $status
            ], [
                "id_reports" => $report_id
            ]);

            App::getMessages()->addMessage(new Message('Status zgłoszenia został zaktualizowany.', Message::INFO));
        } catch (\PDOException $e) {
            App::getMessages()->addMessage(new Message('Błąd podczas aktualizacji statusu zgłoszenia.', Message::ERROR));
        }
    }

    private function startEditingVehicle() {
        $vehicle_id = getFromRequest('edit_vehicle_id');
        if (!$vehicle_id) {
            App::getMessages()->addMessage(new Message('Nie wybrano pojazdu do edycji.', Message::ERROR));
            return;
        }

        try {
            $vehicle = App::getDB()->get("vehicles", "*", ["id" => $vehicle_id]);
            if ($vehicle) {
                SessionUtils::store('edit_vehicle', $vehicle);
            } else {
                App::getMessages()->addMessage(new Message('Nie znaleziono pojazdu do edycji.', Message::ERROR));
            }
        } catch (\PDOException $e) {
            App::getMessages()->addMessage(new Message('Błąd podczas ładowania danych pojazdu.', Message::ERROR));
        }
    }

    private function saveVehicleChanges() {
        $vehicle_id = getFromRequest('save_vehicle_id');
        $brand = trim(getFromRequest('brand'));
        $model = trim(getFromRequest('model'));
        $production_year = trim(getFromRequest('production_year'));
        $vin = trim(getFromRequest('vin'));

        if (!$vehicle_id || empty($brand) || empty($model) || empty($production_year) || empty($vin)) {
            App::getMessages()->addMessage(new Message('Wszystkie pola pojazdu muszą być wypełnione.', Message::ERROR));
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
            SessionUtils::remove('edit_vehicle');
        } catch (\PDOException $e) {
            App::getMessages()->addMessage(new Message('Błąd podczas aktualizacji danych pojazdu.', Message::ERROR));
        }
    }
}
