<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\SessionUtils;

class FinalizeSettlementCtrl {
    public function action_finalizeSettlement() {
        // Pobranie danych użytkownika
        $user_logged_in = SessionUtils::load('user_logged_in', true);
        $user_name = SessionUtils::load('user_name', true);

        $vehicle_id = getFromRequest('vehicle_id');

        if (!$vehicle_id) {
            App::getMessages()->addMessage(new Message('Nie wybrano pojazdu do rozliczenia.', Message::ERROR));
            header("Location: settleVehicles");
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['update_labor'])) {
                $this->updateLabor();
            } elseif (isset($_POST['save_total'])) {
                $this->saveTotalRepairAmount($vehicle_id);
            }
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

            $report_id = App::getDB()->get("reports", "id_reports", ["vehicle_id" => $vehicle_id]);

            if (!$report_id) {
                throw new \Exception("Nie znaleziono raportu dla wybranego pojazdu.");
            }

            $parts = App::getDB()->select("parts", [
                "id_part",
                "part_name",
                "part_price",
                "quantity",
                "total_amount",
                "labor",
                "sum"
            ], ["report_id" => $report_id]);

            $total_sum = array_reduce($parts, function ($carry, $part) {
                return $carry + $part['sum'];
            }, 0);

            App::getSmarty()->assign('vehicle', $vehicle);
            App::getSmarty()->assign('parts', $parts);
            App::getSmarty()->assign('total_sum', $total_sum);
            App::getSmarty()->assign('report_id', $report_id);
            App::getSmarty()->assign('user_logged_in', $user_logged_in); 
            App::getSmarty()->assign('user_name', $user_name);
        } catch (\Exception $e) {
            App::getMessages()->addMessage(new Message('Błąd podczas ładowania danych: ' . $e->getMessage(), Message::ERROR));
            header("Location: settleVehicles");
            exit();
        }

        App::getSmarty()->display('FinalizeSettlementView.tpl');
    }


    private function updateLabor() {
        $part_id = getFromRequest('part_id');
        $labor = getFromRequest("labor_{$part_id}");

        if (!$part_id || !is_numeric($labor) || $labor < 0) {
            App::getMessages()->addMessage(new Message('Niepoprawne dane dla kosztu robocizny.', Message::ERROR));
            return;
        }

        try {
            App::getDB()->update("parts", [
                "labor" => $labor,
                "sum" => App::getDB()->get("parts", "total_amount", ["id_part" => $part_id]) + $labor
            ], ["id_part" => $part_id]);

            App::getMessages()->addMessage(new Message('Koszt robocizny został zaktualizowany.', Message::INFO));
        } catch (\PDOException $e) {
            App::getMessages()->addMessage(new Message('Błąd podczas aktualizacji kosztu robocizny: ' . $e->getMessage(), Message::ERROR));
        }
    }

    private function saveTotalRepairAmount($vehicle_id) {
        $report_id = App::getDB()->get("reports", "id_reports", ["vehicle_id" => $vehicle_id]);

        if (!$report_id) {
            App::getMessages()->addMessage(new Message('Nie znaleziono raportu do zapisania kwoty.', Message::ERROR));
            return;
        }

        $total_sum = getFromRequest('total_sum');

        if (!is_numeric($total_sum) || $total_sum < 0) {
            App::getMessages()->addMessage(new Message('Niepoprawna wartość całkowitej sumy.', Message::ERROR));
            return;
        }

        try {
            App::getDB()->update("reports", [
                "repair_amount" => $total_sum
            ], ["id_reports" => $report_id]);

            App::getMessages()->addMessage(new Message('Kwota całkowita została zapisana.', Message::INFO));
        } catch (\PDOException $e) {
            App::getMessages()->addMessage(new Message('Błąd podczas zapisywania kwoty całkowitej: ' . $e->getMessage(), Message::ERROR));
        }
    }
}
