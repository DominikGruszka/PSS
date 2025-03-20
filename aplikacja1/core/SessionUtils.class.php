<?php

namespace core;

use core\App;

class SessionUtils {

    public static function startSession() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function store($name, $value) {
        self::startSession();
        if (isset($value)) {
            $_SESSION[$name] = $value;
        }
    }

    public static function load($name, $keep = false) {
        self::startSession();
        if (isset($_SESSION[$name])) {
            $r = $_SESSION[$name];
            if (!$keep) {
                unset($_SESSION[$name]);
            }
            return $r;
        }
        return null;
    }

    public static function remove($name) {
        self::startSession();
        if (isset($_SESSION[$name])) {
            unset($_SESSION[$name]);
        }
    }

    public static function clear() {
        self::startSession();
        session_destroy();
    }

    public static function storeMessages() {
        self::startSession();
        $_SESSION['_messages'] = serialize(App::getMessages());
    }

    public static function loadMessages($keep = false) {
        self::startSession();
        if (isset($_SESSION['_messages'])) {
            $msgs = unserialize($_SESSION['_messages']);
            App::setMessages($msgs);
            if (!$keep) {
                unset($_SESSION['_messages']);
            }
        }
    }
}
