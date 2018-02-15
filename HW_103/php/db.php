<?php
try {
    $db = new PDO("mysql:host=localhost;dbname=contacts", "user", 'password',[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    } catch (PDOException $e) {
        $systemError = "ERROR: " . $e->getMessage();
    }
?>