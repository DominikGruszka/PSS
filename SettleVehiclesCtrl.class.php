<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\SessionUtils;

class SettleVehiclesCtrl {
    public function action_settleVehicles() {
        // Pobranie danych użytkownika
        $user_logged_in = SessionUtils::load('user_logged_in', true);
        $user_name = SessionUtils::load('user_name', true);
        $user_role = SessionUtils::load('user_role', true);

        // Sprawdzenie uprawnień
        if ($user_role !== 'pracownik_biurowy') {
            App::getMessages()->addMessage(new Message('Brak dostępu do rozliczania pojazdów.', Message::ERROR));
            header("Location: hello");
            exit();
        }

        // Obsługa zmiany statusu rozliczenia
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->updateSettlementStatus();
        }

        try {
            // Pobranie danych pojazdów i użytkowników
            $vehicles = App::getDB()->select("vehicles", [
                "[>]users" => ["user_id" => "id_users"]
            ], [
                "vehicles.id",
                "users.lastname",
                "vehicles.brand",
                "vehicles.model",
                "vehicles.settled"
            ]);

            // Przekazanie danych do widoku
            App::getSmarty()->assign('vehicles', $vehicles);
            App::getSmarty()->assign('user_logged_in', $user_logged_in);
            App::getSmarty()->assign('user_name', $user_name);
        } catch (\PDOException $e) {
            App::getMessages()->addMessage(new Message('Błąd podczas ładowania danych pojazdów: ' . $e->getMessage(), Message::ERROR));
        }

        App::getSmarty()->display('SettleVehiclesView.tpl');
    }

    private function updateSettlementStatus() {
        $vehicle_id = getFromRequest('vehicle_id');
        $settled_status = trim(getFromRequest("settled_status_{$vehicle_id}"));

        if (!$vehicle_id || ($settled_status !== 'TAK' && $settled_status !== 'NIE')) {
            App::getMessages()->addMessage(new Message('Niepoprawne dane wejściowe.', Message::ERROR));
            return;
        }

        try {
            // Aktualizacja kolumny `settled` w tabeli Vehicles
            App::getDB()->update("vehicles", [
                "settled" => $settled_status
            ], ["id" => $vehicle_id]);

            App::getMessages()->addMessage(new Message('Status rozliczenia został zaktualizowany.', Message::INFO));
        } catch (\PDOException $e) {
            App::getMessages()->addMessage(new Message('Błąd podczas aktualizacji statusu rozliczenia: ' . $e->getMessage(), Message::ERROR));
        }
    }

    public function action_finalizeSettlement() {
        $vehicle_id = getFromRequest('vehicle_id');

        if (!$vehicle_id) {
            App::getMessages()->addMessage(new Message('Nie wybrano pojazdu do rozliczenia.', Message::ERROR));
            header("Location: settleVehicles");
            exit();
        }

        try {
            $vehicle = App::getDB()->get("vehicles", [
                "[>]users" => ["user_id" => "id_users"]
            ], [
                "vehicles.id",
                "users.lastname",
                "vehicles.brand",
                "vehicles.model",
                "vehicles.settled"
            ], ["vehicles.id" => $vehicle_id]);

            if (!$vehicle) {
                throw new \Exception("Nie znaleziono pojazdu o podanym ID.");
            }

            App::getSmarty()->assign('vehicle', $vehicle);
        } catch (\PDOException $e) {
            App::getMessages()->addMessage(new Message('Błąd podczas ładowania danych pojazdu: ' . $e->getMessage(), Message::ERROR));
            header("Location: settleVehicles");
            exit();
        }

        App::getSmarty()->display('FinalizeSettlementView.tpl');
    }
}
