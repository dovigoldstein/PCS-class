<?php
// header("Access-Control-Allow-Origin: http://localhost");
if(function_exists($_GET['method'])){
    $_GET['method']();
}


function jsonpCallback(){
    require "db.php";
    
        $query = "SELECT * FROM contacts";
        $statement = $db->prepare($query);
        $statement->execute();
        $contacts = $statement->fetchAll(PDO::FETCH_ASSOC);
        $contacts = json_encode($contacts);
        echo $_GET['callback'] . '(' . $contacts . ')';
        // echo json_encode($contacts);
}
    
?>