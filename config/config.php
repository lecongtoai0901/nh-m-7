<?php

return [
    'mysql' => [
        'host' => getenv('MYSQL_HOST') ?: 'sql101.infinityfree.com',
        'port' => (int) (getenv('MYSQL_PORT') ?: 3306),
        'database' => getenv('MYSQL_DB') ?: 'if0_40414526_db_bannhaccu',
        'user' => getenv('MYSQL_USER') ?: 'if0_40414526',
        'pass' => getenv('MYSQL_PASS') ?: 'iemcbz3MSF',
        'charset' => 'utf8mb4',
    ],
    'app' => [
        'base_url' => 'https://dh52200473.infinityfreeapp.com',          
    ],
];
