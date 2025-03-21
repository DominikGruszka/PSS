<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\SessionUtils;

class PaginationDemoCtrl {
    private $items_per_page = 10; // Liczba rekordów na stronę

    public function action_paginationDemo() {
        // Pobranie numeru strony (domyślnie 1)
        $current_page = max(1, (int) getFromRequest('page', 1));

        try {
            // Pobranie liczby rekordów w tabeli users 
            $total_items = App::getDB()->count("users");

            // Obliczenie liczby stron
            $total_pages = max(1, ceil($total_items / $this->items_per_page));

            // Pobranie użytkowników dla danej strony
            $users = App::getDB()->select("users", [
                "id_users",
                "login",
                "email",
                "lastname"
            ], [
                "LIMIT" => [$this->items_per_page * ($current_page - 1), $this->items_per_page]
            ]);

            // Przekazanie zmiennych do widoku
            App::getSmarty()->assign('users', $users);
            App::getSmarty()->assign('current_page', $current_page);
            App::getSmarty()->assign('total_pages', $total_pages);
        } catch (\PDOException $e) {
            App::getMessages()->addMessage(new Message('Błąd podczas ładowania danych.', Message::ERROR));
        }

        App::getSmarty()->display('PaginationDemoView.tpl');
    }
}

