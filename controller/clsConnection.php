<?php

class dbConnection
{
    // private $servername = "192.168.16.63";
    // private $username = "sa";
    // private $password = "donterase";
    // private $database = "EHELPDESK";
    private $servername = "(local)";
    private $username = "marvin";
    private $password = "K@t3Orsua166";
    private $database = "monitoringsys";

    function conn()
    {
        try {
            $conn = new PDO("mysql:Server=$this->servername;dbname=monitoringsys", $this->username, $this->password, [True]);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {

            echo "Connection failed: " . $e->getMessage();
            die();
        }
    }
}
