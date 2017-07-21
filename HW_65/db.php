<?php
    try {
        $db = new PDO("mysql:host=localhost;dbname=seforim_store", "user", 'password',[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        } catch (PDOException $e) {
            $systemError = "ERROR: " . $e->getMessage();
        }
?>