<link rel="stylesheet" href="../output.css?<?php echo time(); ?>">
<?php
// session_start();
// if (!isset($_SESSION['current_id']) && !isset($_SESSION['current_name']) && !isset($_SESSION['postion'])) {
//     header("Location: ../index.php");
// }
// // var_dump($_POST);
// if (isset($_POST['method'])  == 'logout') {
//     session_unset();
//     session_destroy();
//     header("Location: ../index.php");
// }
ini_set('display_errors', 1);
error_reporting(E_ALL);
// echo '<pre>';
require('../static/head.php');
require('../client/components/navbar.php');
require('../controller/clsConnection.php');
?>

<div class="client">
    <?php
    require('../client/components/sidebar.php');
    ?>
    <div class="client-content">