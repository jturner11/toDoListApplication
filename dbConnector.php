<?php

class dbConnector
{
    public $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=todoList', 'root', '');
    }
}
