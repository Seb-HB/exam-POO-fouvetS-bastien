<?php
class LoginController{
    private $userManager;

    public function __construct(){
        $this->userManager = new UserManager();
    }


    function loginRouting(){
        if(isset($_POST['login'])){
            var_dump($_POST);
            $this->tryLogin();
        }else{
            require 'layouts/login.php';
        }

    }


    function tryLogin(){

        $errors = [];
        if(empty($_POST['login']) || empty($_POST['password'])){
            $errors[] = 'Vous devez saisir un identifiant ET un mot de passe';
        }else{
            $user= $this->userManager->getByName($_POST['login']);
            if(is_null($user)){
                $errors[] ='Utilisateur inconnu';
            }elseif(!password_verify($_POST['password'], $user->getPassword())){
                $errors[] ='Mot de passe incorrect';
            }
        }

        if(count($errors)==0){
            $_SESSION['utilisateur'] =$user->getUsername();
            header('Location:index.php');
        }else{
            require 'layouts/login.php';
        }
        
    }

}


?>