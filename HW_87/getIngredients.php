<?php
require 'db.php';
if(!empty($_POST["id"])) {
    $id = $_POST["id"];
}else {
    http_response_code(400);
    exit("id is required");
}
try{
    $query = "SELECT GROUP_CONCAT(i.`name` SEPARATOR ',') as name, r.image
            FROM ingredients i 
            join recipeingredients ri
            on ri.ingredient_id = i.id
            JOIN recipes r 
            on r.id = ri.recipe_id
            WHERE ri.recipe_id = :id";
    $statement = $db->prepare($query);
    $statement->bindParam("id", $id);
    $statement->execute();
    $ingredients = $statement->fetch(PDO::FETCH_ASSOC);
    echo json_encode($ingredients);
} catch(PDOException $e){
    echo $e->getMessage();
}
?>