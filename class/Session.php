<?php
class Session {

    private static $_instance = null;

    private function __construct() {
        $this->id = uniqid();
    }

    private function __destruct() {

    }

    public static function getInstance() {
        if(is_null(self::$_instance)) {
            self::$_instance = new Session();
        }
        return self::$_instance;
    }
}