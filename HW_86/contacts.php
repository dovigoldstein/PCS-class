<?php
try {
    $db = new PDO("mysql:host=localhost;dbname=contacts", "user", 'password',[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    $query = "SELECT `firstName`,`lastName`,`email`,`phone` FROM contacts";
    $statement = $db->prepare($query);
    $statement->execute();
    $contacts = $statement->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($contacts);
    } catch (PDOException $e) {
        $systemError = "ERROR: " . $e->getMessage();
    }

?>