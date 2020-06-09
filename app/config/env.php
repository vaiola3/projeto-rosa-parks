<?php
    $variaveis = [
        'DB_HOST'     => 'localhost',
        'DB_USERNAME' => 'pereira',
        'DB_PASSWORD' => '123',
        'DB_NAME'     => 'rparks',
        'DB_PORT'     => '3306',
        'APP_HOST'    => 'localhost:8080',
        'API_USER'    => 'root',
        'API_PASS'    => '123'
    ];

    foreach ($variaveis as $key => $value) {
        putenv("$key=$value");
    }

    function env($key, $default = null){
        $value = getenv($key);
        if ($value === false) {
            return $default;
        }
        return $value;
    }
 ?>