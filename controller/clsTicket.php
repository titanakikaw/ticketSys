<?php

function tableList($id, $limit)
{
    $clsConnection = new dbConnection();
    $conn = $clsConnection->conn();
    // $query = "SELECT * from tbo_tickets as ticket inner join tbo_employee as emp on ticket.emp_id = emp.emp_id INNER join tbo_ticketcategory as t_cat  on ticket.cat_id = t_cat.cat_id where ticket.assigned=?";
    $query = "SELECT * from tx_ServiceRequest";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}
