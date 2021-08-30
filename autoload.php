<?php
spl_autoload_register(function($class){
    // echo('on recherche '.$class.'<br>');
    $folders=[
        'controllers/',
        'models/',
        'models/managers/',
        'layouts/',
        'layouts/partials/'
    ];

    foreach($folders as $folder){
        if (file_exists($folder.$class.'.php')){
            require_once $folder.$class.'.php';
            break;
        }
        // else{
        //     echo($class.' n\'a pas été trouvé dans le répertoire '.$folder.'<br>');
        //     echo($folder.$class.'.php <br>');
        // }
    }


});



?>