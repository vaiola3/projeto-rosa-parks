<?php

namespace RosaParks\Config;

class Env {
    private static $args = [
        'DB_HOST'     => 'localhost',
        'DB_USERNAME' => 'pereira',
        'DB_PASSWORD' => '123',
        'DB_NAME'     => 'rparks',
        'DB_PORT'     => '3306',
        'APP_HOST'    => 'localhost:8080',
        'API_USER'    => 'root',
        'API_PASS'    => '123'
    ];
    
    public static function get($arg) {
        return self::$args[$arg];
    }
}
?>