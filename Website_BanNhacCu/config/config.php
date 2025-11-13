<?php

return [
    'mssql' => [
        'host' => getenv('MSSQL_HOST') ?: 'ZyuukiMusicStore.mssql.somee.com',
        'port' => (int) (getenv('MSSQL_PORT') ?: 1433),
        'database' => getenv('MSSQL_DB') ?: 'ZyuukiMusicStore',
        'user' => getenv('MSSQL_USER') ?: 'Zyuuki_SQLLogin_1',
        'pass' => getenv('MSSQL_PASS') ?: '!Zyuuki213',
        'charset' => 'utf8',
    ],
    'app' => [
        'base_url' => 'http://localhost:8000',
    ],
];
