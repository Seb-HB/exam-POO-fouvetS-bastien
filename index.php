<?php
    session_start();
    require 'autoload.php';

    if (isset($_SESSION['utilisateur'])){
        $controller= new MotoController;
        if (isset($_GET['action'])){
            
        }else{
            
        }
    }else{
        $controller=new LoginController();
        $controller->loginRouting();
    }

    



?>