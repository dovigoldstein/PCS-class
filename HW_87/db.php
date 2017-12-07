<?php
    try {
        $db = new PDO("mysql:host=localhost;dbname=recipes", "user", 'password',[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    } catch (PDOException $e) {
        $error = "Something went wrong " . $e->getMessage();
        //header('HTTP/1.0 500 Internal Server Error');
        http_response_code(500);
        echo $error;
    }
?>