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
        $_POST['params']['create_by'] = $_POST['currentUser'];
        $_POST['params']['date'] = date('d/m/Y');
        $_POST['params']['status'] = "Pending";
        $clsController = new clsController($_POST['params'], 'tbo_ticket');
        array_push($response, $clsController->add());
        break;
    case 'table':
        $TYPE = $_POST['type'];
        if ($TYPE == "deptTickets") {
            $clsController = new clsController("", "tbo_ticket");
            $ticketData = $clsController->viewlist3(true, ['tbo_department', 'tbo_employee'], ["dept_id", 'emp_id'], true, ["tbo_department.dept_id"], $_POST['find']);
            foreach ($ticketData as $key => $value) {
                $assigned = getAssigned($value['ticket_id']);
                if (!$assigned) {
                    $assigned['assigned'] = "Unassigned";
                }
                array_push($ticketData[$key], $assigned['assigned']);
            };
            echo json_encode($ticketData);
        } else if ($TYPE == "myTickets") {
            $clsController = new clsController("", "tbo_ticket_assigned ");
            echo json_encode($clsController->viewlist3(true, ['tbo_ticket', 'tbo_employee'], ["ticket_id", 'emp_id'], true, ["tbo_ticket.ticket_id", "tbo_employee.emp_id"], $_POST['find']));
        } elseif ($TYPE == "createdTicket") {
        }


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
        # code...
        break;
}

// if (count($response) >= 1) {
//     echo json_encode($response);
// }
