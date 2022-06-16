<?php
require('controller/clsConnection.php');
$decoded = base64_decode($_GET['params']);
$baseArray = explode('&', $decoded);
$subArray = [];
$credential = [];
foreach ($baseArray as $key => $value) {
    $subArray = explode('=', $value);
    $credential[$key] = $subArray[1];
}

if ($_GET['login'] = '1') {
    try {
        $clsConnection = new dbConnection();
        $conn = $clsConnection->conn();
        $query = "SELECT emp.emp_id,emp.fname,emp.lname,pos.posDesc, dept.dept_id, pos.pos_id, pos.posRank from tbo_employee as emp 
        INNER JOIN tbo_emp_position as pos on emp.pos_id = pos.pos_id INNER JOIN tbo_department as dept on pos.dept_id = dept.dept_id
        where emp.username=? AND emp.pass=?";
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare($query);
        $stmt->execute($credential);
        $result = $stmt->fetch();
        session_start();
        $_SESSION['current_id'] = $result['emp_id'];
        $_SESSION['current_name'] = $result['lname'] . ', ' . $result['fname'];
        $_SESSION['lname'] = $result['lname'];
        $_SESSION['fname'] = $result['fname'];
        $_SESSION['position'] = $result['posDesc'];
        $_SESSION['rank'] = $result['posRank'];
        $_SESSION['dept'] = $result['dept_id'];
        // $_SESSION['department'] = $
        // echo '<pre>';
        // var_dump($result);
        // die();
        header("Location: client/Dashboard.php", true);
    } catch (\Throwable $th) {
        header("Location : index.php");
    }
} else {
    header("Location : index.php");
}
