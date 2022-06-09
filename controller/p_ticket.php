<?php
require('./clsConnection.php');
require('./clsStandard.php');
require('./clsTicket.php');
header('Content-Type: application/json');
$_POST = json_decode(file_get_contents('php://input'), true);


$response = [];
switch ($_POST['method']) {
    case 'new':
        // $_POST['params']['no'] = "";
        $_POST['params']['date'] = date('m-d-Y');;
        $_POST['params']['status'] = "Pending";
        $_POST['params']['emp_id'] = "1";
        $clsController = new clsController($_POST['params'], 'tbo_employee');
        break;
    case 'update':
        break;
    case 'delete':
        break;
    case 'table':
        $response = tableList('', '');
        var_dump($response);
        die();
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
