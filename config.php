<?php

return [

    'database' => [
        'connection' => 'mysql:host=127.0.0.1',
        'name' => 'myaudio',
        'username' => 'root',
        'password' => '',
        'options' => [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    ],

    'selectel' => [
        'pass' => 'CTBMu9M9Vn',
        'name' => '61637_artistedit',
        'container' => 'myAudio'
    ]

];