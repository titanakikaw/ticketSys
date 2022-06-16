<?php

function departmentTicket($dept)
{
    $data = [];
    $clsConnection = new dbConnection();
    $conn = $clsConnection->conn();
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "SELECT * from tbo_ticket where dept_id =?";
    $stmt = $conn->prepare($query);
    $stmt->execute([]);
    while ($ticketData = $stmt->fetch()) {
        var_dump($ticketData);
    }
    die();
}
function geneTicketNo()
{
    $clsConnection = new dbConnection();
    $conn = $clsConnection->conn();
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "SELECT ticket_no from tbo_ticket ORDER BY `ticket_id` DESC LIMIT 1";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $latest = $stmt->fetch();
    if ($latest) {
        $latest = intval($latest['ticket_no']);
        return $latest += 1;
    } else {
        return 1;
    }
    // die();
}
function getAssigned($ticketno)
{
    $clsConnection = new dbConnection();
    $conn = $clsConnection->conn();
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query =   "SELECT CONCAT(tbo_employee.fname,', ',tbo_employee.lname) as assigned from tbo_ticket_assigned as ta 
    INNER JOIN tbo_ticket on ta.ticket_id = tbo_ticket.ticket_id 
    INNER JOIN tbo_employee on tbo_employee.emp_id = ta.emp_id where ta.ticket_id =?";
    $stmt = $conn->prepare($query);
    $stmt->execute([$ticketno]);
    $data = $stmt->fetch();
    // die();
    // if (!$data) {
    //     $data['assigned'] == "Unassigned";
    // }
    return $data;
}
function saveImage()
{
}
// var_dump(count($_FILES));
// die();
if (count($_FILES) > 0) {
    $target_folder = "../FILES/";
    $target_file  = $target_folder . basename($_FILES['files']["name"]);
    if (move_uploaded_file($_FILES["files"]["tmp_name"], $target_file)) {
        $res['status'] = true;
        $res['file'] =   $target_file;
    } else {
        $res['status'] = false;
    }
    echo json_encode($res);
}
