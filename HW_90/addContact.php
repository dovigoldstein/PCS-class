<?php
require 'db.php';
function getParam($param) {
    if(! empty($_POST[$param])) {
        return $_POST[$param];
    } 
    return "UNKNOWN";
}
$firstName = getParam("firstName");
$lastName = getParam("lastName");
$email = getParam("email");
$phone = getParam("phone");
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