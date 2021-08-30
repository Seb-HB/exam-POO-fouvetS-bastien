<?php
abstract class Database{
    protected $bdd;
    private $host= 'localhost';
    private $dbName= 'exam-poo-seb';
    private $user= 'root';
    private $password= '';

    public function __construct() {
        $this->bdd = new PDO('mysql:dbname='.$this->dbName.'; mysql:host='.$this->host, $this->user,$this->password);
    }

}


?>