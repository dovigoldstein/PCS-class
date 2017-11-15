<?php
require_once 'utils/httpsonly.php';
session_start();
if(isset($_GET['action']) && $_GET['action'] === "logout"){
    unset($_SESSION['username']);
    $action = 'login';
}else{
    if(!isset($_SESSION['username'])) {
        if(isset($_GET['action']))
           $_SESSION['action'] =  $_GET['action'];
        $action = 'login';
    }elseif(!isset($_GET['action'])){
        $action = 'products';
    }else{
        $action = $_GET['action']; 
    }
}

switch($action) {
    case 'login':
        include 'models/loginModel.php';
        include 'views/loginView.php';
        exit;
    case 'products':
        include 'models/productsModel.php';
        include 'views/productsView.php';
        exit;  
    case 'addProducts':
        if($_SESSION['admin'] == 1){
            include 'models/addProductsModel.php';
            include 'views/addProductsView.php';
            exit;
        }else{
            http_response_code(401);
        } 
    default:
        http_response_code(302);
        header("Location: index.php");
        exit;
}
?>