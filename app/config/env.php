<?php
    $variaveis = [
        'DB_HOST' => 'localhost',
        'DB_USERNAME' => 'root',
        'DB_PASSWORD' => '',
        'DB_NAME' => 'programacaoferiasverao2020',
        'DB_PORT' => '3306',
        'APP_HOST' => 'refatorosaparks'
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