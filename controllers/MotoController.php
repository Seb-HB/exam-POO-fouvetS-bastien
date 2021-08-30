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

    function deleteOneMoto($id){
        var_dump($id, 'ici');
        $this->motoManager->delete($id);
       header('Location:index.php');
    }

    function addOneMoto(){

        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            var_dump($_POST); 
            $errors=[];
            $types=['Enduro', 'Custom', 'Sportive', 'Roadster'];
            if (!isset($_POST['marque'])|| $_POST['marque']==''){
                $errors[]='Champ marque invalide';
            }
            if (!isset($_POST['model'])|| $_POST['model']==''){
                $errors[]='Champ modèle invalide';
            }
            if (!isset($_POST['description'])|| $_POST['description']==''){
                $errors[]='Champ description invalide';
            }
            if (!isset($_POST['type'])|| $_POST['type']==''){
                $errors[]='Champ marque invalide';
            }
            if(!in_array($_POST['type'], $types)){
                $errors[]='Type non reconnu';
            }

            if(!isset($_POST['img'])|| $_POST['img']==''){
                $img=null;
            }else{
                $img=$_POST['img'];
            }

            if (count($errors)==0){
                $moto=new Moto ($_POST['marque'], $_POST['model'],$_POST['type'], $_POST['description'], $img);
                $this->motoManager->insert($moto);
                header('Location:index.php');
            }else{
                require 'layouts/form-add.php'; 
            }
        }else{
            require 'layouts/form-add.php';
        }

    }

}

?>