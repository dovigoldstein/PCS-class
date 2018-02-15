<?php
header("Access-Control-Allow-Origin: http://localhost:4200");


// function jsonpCallback(){
    require "db.php";
    
        $query = "SELECT * FROM contacts";
        $statement = $db->prepare($query);
        $statement->execute();
        $contacts = $statement->fetchAll(PDO::FETCH_ASSOC);
        $contacts = json_encode($contacts);
        // echo $_GET['callback'] . '(' . $contacts . ')';
        echo $contacts;
// }
    
?>