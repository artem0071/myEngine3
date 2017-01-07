<?php

$config = require 'config.php';
require 'settings.php';
require 'vendor/autoload.php';

spl_autoload_register(function ($className){

    if (file_exists('core/'.$className.'.php')) require 'core/'.$className.'.php';
    elseif (file_exists('core/DB/'.$className.'.php')) require 'core/DB/'.$className.'.php';
    elseif (file_exists(CONTROLLERS.$className.'.php')) require CONTROLLERS.$className.'.php';
    elseif (file_exists('core/Selectel/'.$className.'.php')) require 'core/Selectel/'.$className.'.php';

});

$selectelStorage = new SelectelStorage($config['selectel']['name'], $config['selectel']['pass']);

function dd($param){
    echo '<pre>';
    var_dump($param);
    echo '</pre>';
}

function redirect($page = '/'){
    header('Location: '.$page);
}
