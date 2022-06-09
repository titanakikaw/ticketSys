<?php

class clsController
{
    public $columns;
    public $table;
    public $values;
    public $data = [];

    function __construct($columns, $table)
    {
        $this->table = $table;
        if ($columns != '') {
            foreach ($columns as $key => $value) {
                if ($this->columns != '') {
                    $this->columns .= ', ';
                    $this->values .= ", ";
                }
                $this->columns .=  "`" . $key . "`";
                $this->values .= ":" . $key;
                array_push($this->data, $value);
            }
        }
    }

    function check()
    {
        try {
            $clsConnection = new dbConnection();
            $conn = $clsConnection->conn();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = "SELECT * from `$this->table` where $this->columns=?";
            $stmt = $conn->prepare($query);
            $stmt->execute($this->data);
            $dbData = $stmt->fetch();
            if ($dbData) {
                return true;
            }
        } catch (\Throwable $th) {
            var_dump($th);
            return false;
        }
    }

    function add()
    {
        try {
            $clsConnection = new dbConnection();
            $conn = $clsConnection->conn();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = "INSERT INTO `$this->table` ($this->columns) VALUES ($this->values)";
            $stmt = $conn->prepare($query);
            foreach (explode(",", $this->values) as $key => $value) {
                $value = trim($value);
                $stmt->bindParam("$value",  $this->data[$key]);
            }
            $stmt->execute();
            return true;
        } catch (\Throwable $error) {
            var_dump($error);
            return false;
            // die();
        }
    }
    function viewlist()
    {
        try {
            $clsConnection = new dbConnection();
            $conn = $clsConnection->conn();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = "SELECT * from `$this->table`";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $db_data = $stmt->fetchAll();
            return $db_data;
        } catch (\Throwable $th) {
            var_dump($th);
            return false;
            // die();
        }
    }
    function get()
    {
        try {
            $clsConnection = new dbConnection();
            $conn = $clsConnection->conn();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = "SELECT * from `$this->table` where $this->column=?";
            $stmt = $conn->prepare($query);
            $stmt->execute([$this->data]);
            $dbData = $stmt->fetch();
            return $dbData;
        } catch (\Throwable $th) {
            var_dump($th);
            return false;
            die();
        }
    }
    function update($id, $identifier)
    {
        try {
            $this->columns = str_replace(':', '', $this->columns);
            $this->columns = explode(',', $this->columns);
            $set = '';
            foreach ($this->columns as $key => $value) {
                if ($set != '') {
                    $set .= ',';
                }
                $set .= $value . '="' . $this->data[$key] . '"';
            }
            $clsConnection = new dbConnection();
            $conn = $clsConnection->conn();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = "UPDATE `$this->table` SET $set where $identifier = ?";
            $stmt = $conn->prepare($query);
            $stmt->execute([$id]);
            return true;
        } catch (\Throwable $error) {
            var_dump($error);
            return false;
            // die();
        }
    }

    function delete()
    {
        try {
            $clsConnection = new dbConnection();
            $conn = $clsConnection->conn();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = "DELETE from `$this->table` where $this->columns=?";
            $stmt = $conn->prepare($query);
            $stmt->execute($this->data);
            return true;
        } catch (\Throwable $th) {
            var_dump($th);
            return false;
        }
    }
}
