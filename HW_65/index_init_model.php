<?php
    include 'db.php';
    $seforim = [];
    try {
        $query = "SELECT * FROM seforim";
        $statement = $db->prepare($query);
        $statement->execute();
        $seforim = $statement->fetchall(PDO::FETCH_ASSOC);     
    }catch(PDOException $e) {
        $systemError = "ERROR: " . $e->getMessage();
    }
?>