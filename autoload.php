<?php
spl_autoload_register(function($class){
    $folders=[
        'controllers/',
        'models/',
        'display/',
        'display/partials/'
    ];

    foreach($folders as $folder){
        if (file_exists($folder.$class.'php')){
            require_once $folder.$class.'php';
            break;
        }
    }


});



?>