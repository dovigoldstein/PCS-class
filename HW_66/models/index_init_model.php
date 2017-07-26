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
    try {
        $query = "SELECT DISTINCT(`category`) FROM seforim";
        $statement = $db->prepare($query);
        $statement->execute();
        $categories = $statement->fetchall(PDO::FETCH_COLUMN);     
    }catch(PDOException $e) {
        $systemError = "ERROR: " . $e->getMessage();
    }
?>