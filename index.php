<?php
    session_start();
    require 'autoload.php';

    if (isset($_SESSION['utilisateur'])){
        $controller= new MotoController;
        if (isset($_GET['del'])){
            $controller->deleteOneMoto($_GET['del']);
        }elseif (isset($_GET['detail'])){
            $controller->getDetail($_GET['detail']);
        }elseif (isset($_GET['add'])){
            $controller->addOneMoto();
        }elseif (isset($_GET['type'])){
            $controller-> motoByType($_GET['type']);
        }else{
            $controller->accueilMoto();
        }
    }else{
        $controller=new LoginController();
        $controller->loginRouting();
    }

    



?>