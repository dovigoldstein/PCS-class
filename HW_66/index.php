<?php
    $action = "home";
    if(!empty($_GET['action'])) {
        $action = $_GET['action'];
    }
    switch($action) {
        case 'home':
            include 'controllers/index_controller.php';
            exit;
        case 'add_sefer':
            include 'controllers/add_sefer_controller.php';
            exit;
        default:
            $error = "Dont know how to $action";
            include 'views/error.php';
            exit;
    }
?>