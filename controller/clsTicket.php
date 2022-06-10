<?php

// function tableList($id, $limit)
// {
//     $clsConnection = new dbConnection();
//     $conn = $clsConnection->conn();
//     // $query = "SELECT * from tbo_tickets as ticket inner join tbo_employee as emp on ticket.emp_id = emp.emp_id INNER join tbo_ticketcategory as t_cat  on ticket.cat_id = t_cat.cat_id where ticket.assigned=?";
//     $query = "SELECT * from tx_ServiceRequest";
//     $stmt = $conn->prepare($query);
//     $stmt->execute();
//     $result = $stmt->fetchAll();
//     return $result;
// }

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
    $query = "SELECT ticket_no from tbo_ticket ORDER BY `date` DESC LIMIT 1";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $latest = $stmt->fetch();
    if ($latest) {
        return $latest += 1;
    } else {
        return 1;
    }
}
