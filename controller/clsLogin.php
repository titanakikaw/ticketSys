<?php
require('./clsConnection.php');
if ($_POST['method'] == "login") {
    $params = $_POST['login'];
    $clsConnection = new dbConnection();
    $conn = $clsConnection->conn();
    $query = "SELECT * from tbo_employee where username=? AND pass=?";
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare($query);
    $stmt->execute([$params['username'], $params['pass']]);
    if ($result = $stmt->fetch()) {
        echo json_encode(true);
    } else {
        echo json_encode(false);
    }
}
