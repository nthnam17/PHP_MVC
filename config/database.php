<?php

class Database extends PDO {
    public function __construct(){
        $contect = 'mysql:dbname=boutiqe_mvc; host=localhost';
        $user = 'root';
        $pass = '';
        parent::__construct($contect,$user,$pass);
    }
}