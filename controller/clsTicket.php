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
    // if (!$data) {
    //     $data['assigned'] == "Unassigned";
    // }
    return $data;
}
