<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\SessionUtils;

class PaginationDemoCtrl {
    private $items_per_page = 10; // Liczba użytkowników na stronę

    public function action_paginationDemo() {
        // Pobranie numeru strony (domyślnie 1)
        $current_page = max(1, (int) getFromRequest('page', 1));

        // Pobranie wartości wyszukiwania (nazwisko)
        $search = trim(getFromRequest('search', ''));

        try {
            // Warunek filtrowania po nazwisku, jeśli podano nazwisko
            $where = [];
            if (!empty($search)) {
                $where['lastname[~]'] = "%{$search}%"; // Częściowe dopasowanie nazwiska (LIKE w SQL)
            }

            // Pobranie liczby rekordów (uwzględniając ewentualne filtrowanie)
            $total_items = App::getDB()->count("users", $where);

            // Obliczenie liczby stron
            $total_pages = max(1, ceil($total_items / $this->items_per_page));

            // Pobranie użytkowników 
            $users = App::getDB()->select("users", [
                "id_users",
                "login",
                "email",
                "lastname"
            ], array_merge($where, [
                "LIMIT" => [$this->items_per_page * ($current_page - 1), $this->items_per_page]
            ]));

            App::getSmarty()->assign('users', $users);
            App::getSmarty()->assign('search', $search);
            App::getSmarty()->assign('current_page', $current_page);
            App::getSmarty()->assign('total_pages', $total_pages);
        } catch (\PDOException $e) {
            App::getMessages()->addMessage(new Message('Błąd podczas pobierania użytkowników: ' . $e->getMessage(), Message::ERROR));
        }

        App::getSmarty()->display('PaginationDemoView.tpl');
    }
}
