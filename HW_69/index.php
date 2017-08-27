<?php
$action = "home";
if(!empty($_GET['action'])) {
    $action = $_GET['action'];
}

switch($action) {
    case 'home':
        include 'views/homeViewStyles.php';
        include 'views/HomeViewClass.php';
        $HV = new HomeViewClass();
        include 'controllers/homeController.php';
        // include 'models/housesModel.php';
        // include 'views/homeView.php';
        
        $HV->render();
        exit;
    case 'table':
        include 'controllers/housesTableController.php';
        exit;
    case 'details':
        include 'controllers/houseDetailsController.php';
        exit;
    default:
        $error = "Dont know how to $action";
        include 'views/error.php';
        exit;
}

?>