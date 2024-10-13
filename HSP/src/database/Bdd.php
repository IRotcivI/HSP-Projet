<?php

class BaseDeDonne{
    private $con;

    public function __construct(){
        $this->con = new PDO('mysql:host=localhost:3306;dbname=hsp;charset=utf8', 'HSP-Account', 'Lprs93440');
    }

    public function getBdd(){
        return $this->con;
    }
}