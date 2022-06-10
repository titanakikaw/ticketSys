<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require('./clsConnection.php');

require('./clsStandard.php');

require('./clsTicket.php');
header('Content-Type: application/json');
$_POST = json_decode(file_get_contents('php://input'), true);


$response = [];
switch ($_POST['method']) {
    case 'new':
        $_POST['params']['ticket_no'] = geneTicketNo();
        $_POST['params']['create_by'] = $_POST['currentUser'];
        $_POST['params']['date'] = date('d/m/Y');
        $_POST['params']['status'] = "Pending";
        $clsController = new clsController($_POST['params'], 'tbo_ticket');
        array_push($response, $clsController->add());
        break;
    case 'update':
        break;
    case 'delete':
        break;
    case 'deptTicket':
        departmentTicket("IT");
        break;
    case 'get_emp':
        $clsController = new clsController('', 'tbo_employee');
        array_push($response, $clsController->viewlist());
        break;
    case 'get_cat':
        $clsController = new clsController('', 'tbo_ticketcategory');
        array_push($response, $clsController->viewlist());
        break;
    default:
        # code...
        break;
}

if (count($response) >= 1) {
    echo json_encode($response);
}
