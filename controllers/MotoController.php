<?php
class MotoController{

    private $motoManager;

    public function __construct(){
        $this->motoManager = new MotoManager();
    }

    function accueilMoto(){
        require 'layouts/accueil-moto.php';
    }

}

?>