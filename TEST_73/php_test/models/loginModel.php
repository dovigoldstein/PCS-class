<?php
require_once 'utils/query.php';
$username = '';
$password = '';
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(!empty($_POST['username'])) {
        $username = $_POST['username'];
    }
    if(!empty($_POST['password'])) {
        $password = $_POST['password'];
    }
    if(!empty($username) && !empty($password)) {
        $query = new query(array('password','admin'),'users',"username = '$username'");
        $results = $query->getResult();
        if(!empty($query->getError())){
            $errors[] = $query->getError();
        }elseif(!empty($results)){
            $hash = $results[0]['password'];
            if(password_verify($password, $hash)) {
                $_SESSION['username'] = $username;
                $_SESSION['admin'] = $results[0]['admin'];

                    if(!empty($_SESSION['action'])) {
                    $action = $_SESSION['action'];
                    unset($_SESSION['action']);
                } else {
                    $action = "products";
                }
                http_response_code(302);
                header("Location: index.php?action=$action");
                exit;
            }else{
                $errors[] = "Username and password did not match our records. Please try again";
            }
        }else{
            $errors[] = "Username and password did not match our records. Please try again";
        }    
    } else {
        $errors[] = "Username and password are required";
    }
}