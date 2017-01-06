<?php

require 'config.php';
require 'settings.php';

spl_autoload_register(function ($className){

    if (file_exists('core/'.$className.'.php')) require 'core/'.$className.'.php';
    elseif (file_exists('core/DB/'.$className.'.php')) require 'core/DB/'.$className.'.php';
    elseif (file_exists(CONTROLLERS.$className.'.php')) require CONTROLLERS.$className.'.php';

});

function dd($param){
    echo '<pre>';
    var_dump($param);
    echo '</pre>';
}

function redirect($page = '/'){
    header('Location: '.$page);
}
