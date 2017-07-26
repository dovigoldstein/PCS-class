<?php
    include 'utils/db.php';
    try {
        $db = new PDO("mysql:host=localhost;dbname=seforim_store", "user", 'password',[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
            $insert = "INSERT INTO `seforim`(`name`, `price`,`category`) VALUES (?,?,?)";
            $statement = $db->prepare($insert);
            $statement->bindValue(1,$name);
            $statement->bindValue(2,$price);
            $statement->bindValue(3,$category);
            $statement->execute();
            $submitted = $name . "(" . $category . ")- $" .number_format($price,2) . " has been added successfully ";
        } catch (PDOException $e) {
            $systemError = "ERROR: " . $e->getMessage();
        }
?>