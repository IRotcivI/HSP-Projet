<?php

class BaseDeDonne{
    private $con;

    public function __construct(){
        $this->con = new PDO('mysql:host=localhost:3306;dbname=hsp;charset=utf8', 'root', '');
    }

    public function getBdd(){
        return $this->con;
    }
}