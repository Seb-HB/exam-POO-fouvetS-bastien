<?php
interface Crud{

    public function getAll();

    public function getOne($id);

    public function update($object);

    public function delete($id);

    public function insert($objet);

    function setMessage($message, $error);

}


?>