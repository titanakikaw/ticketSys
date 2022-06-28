<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require('./clsConnection.php');
require('./clsStandard.php');
require('./clsTicket.php');
header('Content-Type: application/json');
$_POST = json_decode(file_get_contents('php://input'), true);

switch ($_POST['method']) {
    case 'new':
        $_POST['params']['ticket_no'] = geneTicketNo();
        $_POST['params']['date'] = date('d/m/Y');
        $_POST['params']['status'] = "Pending";
        $_POST['params']['emp_id'] = $_POST['currentUser'];
        if ($_POST['file']) {
            $_POST['params']['file'] = "../FILES/" . $_POST['file'];
        }
        $clsController = new clsController($_POST['params'], 'tbo_ticket');
        echo json_encode($clsController->add());
        break;
    case 'table':
        $TYPE = $_POST['type'];
        if ($TYPE == "department") {
            $clsController = new clsController("", "tbo_ticket");
            $ticketData = $clsController->viewlist3(true, ['tbo_department', 'tbo_employee'], ["dept_id", 'emp_id'], true, ["tbo_department.dept_id"], $_POST['find']);

            // die();
            // echo json_encode($ticketData);
        } else if ($TYPE == "mytickets") {
            $clsController = new clsController("", "tbo_ticket_assigned ");
            $ticketData = $clsController->viewlist3(true, ['tbo_ticket', 'tbo_employee'], ["ticket_id", 'emp_id'], true, ["tbo_ticket.ticket_id", "tbo_employee.emp_id"], $_POST['find']);
        } elseif ($TYPE == "senttickets") {
            $clsController = new clsController("", "tbo_ticket");
            $ticketData = $clsController->viewlist3(true, ['tbo_department', 'tbo_employee'], ["dept_id", 'emp_id'], true,["tbo_ticket.emp_id"], $_POST['find']);
        }
        foreach ($ticketData as $key => $value) {
            $assigned['stat'] = getAssigned($value['ticket_id']);
            if (!$assigned['stat']) {
                $assigned['assigned'] = "Unassigned";
            } else {
                $assigned['assigned'] = $assigned['stat']['assigned'];
            }
            array_push($ticketData[$key], $assigned['assigned']);
        };
        echo json_encode($ticketData);
        break;
    case 'delete':
        $IDS = $_POST['xdata'];
        foreach ($IDS as $key => $value) {
            $clsController = new clsController($IDS, 'tbo_ticket');
            $clsController->delete("ticket_id", $value);
        }

        break;
    case 'update':
        $IDS = $_POST['xdata'];
        $data['status'] = "Done";
        $clsController = new clsController($data, 'tbo_ticket');
        foreach ($IDS as $key => $value) {
            $clsController->update($value, "ticket_id");
        }
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
    case 'singeTicket':
        $ticket_id = $_POST['ticket_id'];
        $clsController = new clsController('', 'tbo_ticket');
        $response['ticketInfo'] = $clsController->viewlist3(true, ['tbo_department', 'tbo_employee'], ['dept_id', 'emp_id'], true, ['tbo_ticket.ticket_id'], [$ticket_id]);
        $response['ticketInfo'][0]['assigned'] = getAssigned($ticket_id) ? getAssigned($ticket_id) : "Unassigned";
        $clsController = new clsController('', 'tbo_ticket_comments');
        $response['comments'] = $clsController->viewlist2(true, 'tbo_employee', 'emp_id', 'tbo_ticket_comments.ticket_id', $ticket_id);
        echo json_encode($response);
        break;
    default:
        break;
}
