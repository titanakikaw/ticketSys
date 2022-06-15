<?php
require('./clsConnection.php');
require('./clsStandard.php');
header('Content-Type: application/json');
$_POST = json_decode(file_get_contents('php://input'), true);
$response = [];
switch ($_POST['action']) {
    case 'new':
        $xparams['params'] = $_POST['xdata'];
        $clsController = new clsController($_POST['xdata'], "tbo_emp_position");
        echo json_encode($clsController->add());
        break;
    case 'get_list':
        $xparams['params'] = $_POST['xdata'];
        $xdept_id = $_POST['params']['dept_id'];
        $condition = "tbo_emp_position where dept_id =$xdept_id";
        $clsController = new clsController($_POST['xdata'], "tbo_emp_position");
        echo json_encode($clsController->viewlist());
        break;

    case 'get_position': 
        
        $xparams['params'] = $_POST['xdata'];
        $xdept_id = $xparams['params']['dept_id'];
        $condition = "tbo_emp_position where dept_id =$xdept_id";
        $clsController = new clsController($_POST['xdata'], $condition );
        echo json_encode($clsController->viewlist());
        break;


    case 'custom_list':
        $xparams = $_POST['xdata'];
        $innerJoin = "tbo_emp_position as a Inner JOIN tbo_department as b on a.dept_id = b.dept_id";
        $clsController = new clsController($_POST['xdata'], $innerJoin);
        echo json_encode($clsController->viewlist());
        break;

    
}
