<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\SessionUtils;

class PartsDemandCtrl {
    public function action_partsDemand() {
        $user_logged_in = SessionUtils::load('user_logged_in', true);
        $user_name = SessionUtils::load('user_name', true);
        $user_role = SessionUtils::load('user_role', true);

        if ($user_role !== 'pracownik_warsztatowy') {
            App::getMessages()->addMessage(new Message('Brak dostępu do zamówień części.', Message::ERROR));
            header("Location: hello");
            exit();
        }

        $vehicle_id = getFromRequest('vehicle_id');

        if (!$vehicle_id) {
            App::getMessages()->addMessage(new Message('Nie wybrano pojazdu.', Message::ERROR));
            header("Location: workshopPanel");
            exit();
        }

        // Obsługa dodawania części
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_part'])) {
            $this->addPart($vehicle_id);
        }

        try {
            $report_id = App::getDB()->get("reports", "id_reports", ["vehicle_id" => $vehicle_id]);

            if (!$report_id) {
                throw new \Exception("Nie znaleziono raportu dla wybranego pojazdu.");
            }

            $vehicle = App::getDB()->get("vehicles", [
                "id",
                "brand",
                "model",
                "production_year",
                "vin"
            ], ["id" => $vehicle_id]);

            $parts = App::getDB()->select("parts", "*", ["report_id" => $report_id]);

            App::getSmarty()->assign('vehicle', $vehicle);
            App::getSmarty()->assign('parts', $parts);
            App::getSmarty()->assign('report_id', $report_id);
            App::getSmarty()->assign('user_logged_in', $user_logged_in);
            App::getSmarty()->assign('user_name', $user_name);
        } catch (\Exception $e) {
            App::getMessages()->addMessage(new Message('Błąd podczas ładowania danych pojazdu, raportu lub części.', Message::ERROR));
            if (App::getConf()->debug) {
                App::getMessages()->addMessage(new Message($e->getMessage(), Message::ERROR));
            }
            header("Location: workshopPanel");
            exit();
        }

        App::getSmarty()->display('PartsDemandView.tpl');
    }

    private function addPart($vehicle_id) {
        $part_name = trim(getFromRequest('part_name'));
        $serial_number = trim(getFromRequest('serial_number'));
        $quantity = trim(getFromRequest('quantity'));
        $note = trim(getFromRequest('note'));

        if (empty($part_name) || empty($serial_number) || empty($quantity)) {
            App::getMessages()->addMessage(new Message('Wszystkie wymagane pola muszą być wypełnione.', Message::ERROR));
            return;
        }

        if (!is_numeric($quantity) || $quantity <= 0) {
            App::getMessages()->addMessage(new Message('Ilość musi być liczbą większą od zera.', Message::ERROR));
            return;
        }

        try {
            $report_id = App::getDB()->get("reports", "id_reports", ["vehicle_id" => $vehicle_id]);

            App::getDB()->insert("parts", [
                "part_name" => $part_name,
                "serial_number" => $serial_number,
                "quantity" => $quantity,
                "order_status" => "Złożono zapotrzebowanie",
                "report_id" => $report_id,
                "notatka" => $note ?: null,
                "created_at" => date("Y-m-d H:i:s")
            ]);

            App::getMessages()->addMessage(new Message('Część została dodana pomyślnie.', Message::INFO));
        } catch (\PDOException $e) {
            App::getMessages()->addMessage(new Message('Błąd podczas dodawania części.', Message::ERROR));
            if (App::getConf()->debug) {
                App::getMessages()->addMessage(new Message($e->getMessage(), Message::ERROR));
            }
        }
    }

    public function action_deletePart() {
        $part_id = getFromRequest('part_id');

        if (!$part_id) {
            App::getMessages()->addMessage(new Message('Nie wybrano części do usunięcia.', Message::ERROR));
            header("Location: workshopPanel");
            exit();
        }

        try {
            App::getDB()->delete("parts", ["id_part" => $part_id]);
            App::getMessages()->addMessage(new Message('Część została usunięta pomyślnie.', Message::INFO));
        } catch (\PDOException $e) {
            App::getMessages()->addMessage(new Message('Błąd podczas usuwania części.', Message::ERROR));
        }

        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit();
    }
}
