<?php
    try {
            $query = "SELECT DISTINCT(`category`) FROM seforim";
            $statement = $db->prepare($query);
            $statement->execute();
            $categories = $statement->fetchall(PDO::FETCH_COLUMN);  
        }catch(PDOException $e) {
            $systemError = "ERROR: " . $e->getMessage();
        }
?>