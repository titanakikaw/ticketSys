<?php
require('./clsConnection.php');
require('./clsStandard.php');
header('Content-Type: application/json');
$_POST = json_decode(file_get_contents('php://input'), true);
$response = [];
switch ($_POST['action']) {
    case 'new':
        $xparams['params'] = $_POST['xdata'];
        $clsController = new clsController($_POST['xdata'], "tbo_department");
        echo json_encode($clsController->add());
        break;
    case 'get':
        $xparams['params'] = $_POST['xdata'];
        $clsController = new clsController($_POST['xdata'], "tbo_department");
        echo json_encode($clsController->viewlist());
        break;
}
