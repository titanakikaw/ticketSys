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
                if ($value != '') {
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
                var_dump($this->data[$key]);
            }
           
            die();
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
            $query = "SELECT * from $this->table";
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
    function viewlist2($innerjoin, $table2, $link, $where, $find)
    {
        $condition = "";
        if ($innerjoin) {
            $table1 = "$this->table.$link";
            $condition .= "INNER JOIN $table2 on $table1 = $table2.$link";
        }
        if ($where != '') {
            $condition .= " where $where = ?";
        }
        try {
            $clsConnection = new dbConnection();
            $conn = $clsConnection->conn();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = "SELECT * from $this->table $condition";
            // vard
            $stmt = $conn->prepare($query);
            $stmt->execute([$find]);
            $data = $stmt->fetchAll();
            return $data;
        } catch (\Throwable $th) {
            var_dump($th);
            return false;
        }
    }
    function viewlist3($innerjoin, $tables, $links, $hasCondition, $where, $find)
    {
        $condition = "";
        $where_condition = "";
        if ($innerjoin) {
            foreach ($tables as $key => $value) {
                $condition .= "INNER JOIN ";
                $table1 = trim($this->table) . ".$links[$key]";
                $condition .= "$value on $table1 = $value.$links[$key] ";
            }
        };

        if ($hasCondition) {
            foreach ($where as $key => $value) {
                if ($value != '') {
                    $where_condition .= "AND";
                }
                $where_condition = $value . " = ?";
            }
            $where_condition = "where " .  $where_condition;
        }

        try {
            $clsConnection = new dbConnection();
            $conn = $clsConnection->conn();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = "SELECT * from $this->table $condition $where_condition";
            // var_dump($find);
            // die();
            $stmt = $conn->prepare($query);
            $stmt->execute($find);
            $data = $stmt->fetchAll();
            return $data;
        } catch (\Throwable $th) {
            var_dump($th);
            return false;
        }
    }
}
