<?php
include_once('./config/database.php');


class baseModel extends Database {
    protected $db = array();

    public function __construct(){
        $this->db = new Database();
    }
}