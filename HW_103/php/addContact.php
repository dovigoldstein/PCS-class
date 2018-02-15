<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
header("Access-Control-Allow-Headers: authorization, content-type, responseType, X-Requested-With");
header("Access-Control-Allow-Methods: POST, OPTIONS");

require 'db.php';

$_POST = json_decode(file_get_contents('php://input'), true);
// function getParam($param) {
//     if(! empty($_POST[$param])) {
//         return $_POST[$param];
//     } 
//     return "UNKNOWN";
// }
// $firstName = getParam("firstName");
// $lastName = getParam("lastName");
// $email = getParam("email");
// $phone = getParam("phone");
$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
$email = $_POST["email"];
$phone = $_POST["phone"];

$query = "INSERT INTO CONTACTS (firstName, lastName, email, phone) 
            VALUES (:firstName, :lastName, :email, :phone)";
$statement = $db->prepare($query);
$statement->bindParam("firstName", $firstName);
$statement->bindParam("lastName", $lastName);
$statement->bindParam("email", $email);
$statement->bindParam("phone", $phone);
$rowsInserted = $statement->execute();
if(!$rowsInserted) {
    http_response_code(500);
    exit("Unable to add contact");
}
$contactId = $db->lastInsertId();
echo json_encode($contactId);
http_response_code(201);
?>