<?php 

namespace app\controllers;

use core\App;
use core\Message;
use core\SessionUtils;

class OrderPartsOverviewCtrl {
    public function action_orderPartsOverview() {
        // Pobranie danych użytkownika
        $user_logged_in = SessionUtils::load('user_logged_in', true);
        $user_name = SessionUtils::load('user_name', true);
        $user_role = SessionUtils::load('user_role', true);

        // Sprawdzenie uprawnień
        if ($user_role !== 'pracownik_biurowy') {
            App::getMessages()->addMessage(new Message('Brak dostępu do przeglądu części.', Message::ERROR));
            header("Location: hello");
            exit();
        }

        // Obsługa formularzy
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['edit_part'])) {
                $this->editPart();
            }
        }

        try {
            $parts = App::getDB()->select("parts", [
                "[>]reports" => ["report_id" => "id_reports"],
                "[>]vehicles" => ["reports.vehicle_id" => "id"]
            ], [
                "parts.id_part",
                "parts.part_name",
                "parts.serial_number",
                "parts.quantity",
                "parts.notatka",
                "parts.part_price",
                "parts.order_status",
                "total_amount" => App::getDB()->raw("parts.quantity * parts.part_price"),
                "vehicles.brand",
                "vehicles.model"
            ], [
                "ORDER" => ["parts.id_part" => "DESC"] 
            ]);

            // Przekazanie danych do widoku
            App::getSmarty()->assign('parts', $parts);
            App::getSmarty()->assign('user_logged_in', $user_logged_in);
            App::getSmarty()->assign('user_name', $user_name);
        } catch (\PDOException $e) {
            App::getMessages()->addMessage(new Message('Błąd podczas ładowania części: ' . $e->getMessage(), Message::ERROR));
        }

        App::getSmarty()->display('OrderPartsOverviewView.tpl');
    }

    private function editPart() {
        $part_id = getFromRequest('part_id');
        $part_price = trim(getFromRequest("part_price_{$part_id}"));
        $order_status = trim(getFromRequest("order_status_{$part_id}"));

        if (!is_numeric($part_price) || $part_price < 0) {
            App::getMessages()->addMessage(new Message('Cena musi być liczbą większą lub równą 0.', Message::ERROR));
            return;
        }

        if (empty($order_status)) {
            App::getMessages()->addMessage(new Message('Status zamówienia jest wymagany.', Message::ERROR));
            return;
        }

        try {
            // Aktualizacja danych w tabeli `parts`
            App::getDB()->update("parts", [
                "part_price" => $part_price,
                "order_status" => $order_status,
                "total_amount" => App::getDB()->raw("quantity * {$part_price}")
            ], ["id_part" => $part_id]);

            App::getMessages()->addMessage(new Message('Część została zaktualizowana pomyślnie.', Message::INFO));
        } catch (\PDOException $e) {
            App::getMessages()->addMessage(new Message('Błąd podczas aktualizacji części: ' . $e->getMessage(), Message::ERROR));
        }
    }
}
