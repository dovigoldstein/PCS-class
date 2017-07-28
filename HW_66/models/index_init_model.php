<?php
    include 'utils/db.php';
    $seforim = [];
    if(! empty($_GET["category"])) {
        $category = $_GET["category"];
    }
    try {
        $query = "SELECT * FROM seforim";
        if (! empty($category)) {
            $query .= " WHERE category = ?";
        }
        $statement = $db->prepare($query);
        if (! empty($category)) { 
            $statement->bindValue(1, $category);
        }
        $statement->execute();
        $seforim = $statement->fetchall(PDO::FETCH_ASSOC);     
    }catch(PDOException $e) {
        $systemError = "ERROR: " . $e->getMessage();
    }
?>