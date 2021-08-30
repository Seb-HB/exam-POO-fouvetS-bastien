<?php
class MotoController{

    private $motoManager;

    public function __construct(){
        $this->motoManager = new MotoManager();
    }

    function accueilMoto(){
        $motos=$this->motoManager->getAll();
        require 'layouts/accueil-moto.php';
    }

    function getDetail($id){
        $moto=$this->motoManager->getOne($id);
        require 'layouts/detail-moto.php';

    }

    function motoByType($type){
        $motos=$this->motoManager->getMotosByType($type);
        require 'layouts/accueil-moto.php';
    }

}

?>