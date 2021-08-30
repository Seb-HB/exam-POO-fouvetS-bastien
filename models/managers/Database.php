<?php
abstract class Database{
    private $bdd;
    private $host= 'localhost';
    private $dbName= 'motos';
    private $user= 'root';
    private $password= '';

    public function __construct() {
        $this->bdd = new PDO('mysql:dbname='.$this->dbName.'; mysql:host='.$this->host, $this->user,$this->password);
    }
}


?>