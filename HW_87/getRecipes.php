<?php
require 'db.php';
$query = "SELECT * FROM recipes";
$statement = $db->query($query);
$recipes = $statement->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($recipes);
?>