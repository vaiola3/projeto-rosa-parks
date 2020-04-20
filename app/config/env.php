<?php
    $variaveis = [
        'DB_HOST'     => 'localhost',
        'DB_USERNAME' => 'root',
        'DB_PASSWORD' => '',
        'DB_NAME'     => 'projetorosaparks',
        'DB_PORT'     => '3306',
        'APP_HOST'    => 'projetorosaparks',
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