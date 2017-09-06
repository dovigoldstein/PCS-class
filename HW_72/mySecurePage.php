<?php
require "httpsonly.php";
require_once 'db.php';
$db = database::getInstance();
$user_name = '';
$password = '';
if($_SERVER['REQUEST_METHOD'] === "POST"){
    if(!empty($_POST['user_login']) && !empty($_POST['password_login'])){
        $user_name = $_POST['user_login'];
        $password = $_POST['password_login'];
    }
}
try {
    $query = "SELECT `password` FROM passwords WHERE `user_name` = :user_name";

    $statement = $db->getDB()->prepare($query);
    $statement->bindValue('user_name', $user_name);

    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_COLUMN);
    $statement->closeCursor();
} catch (PDOException $e) {
    $error = "Something went wrong " . $e->getMessage();
}
if(isset($result)){
    $real_password = $result;
}
if(!isset($real_password) || !password_verify($password, $real_password)) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  </head>
  <body>
    <div class="jumbotron text-center">
        <h1>Secure Info</h1>
    </div>
    <div class="container">
       
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  </body>
</html>