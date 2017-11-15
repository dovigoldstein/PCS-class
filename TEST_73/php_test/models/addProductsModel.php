<?php
require_once 'utils/db.php';
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // $fields = ['Product Name' => 'name','Description' => 'description','Price' => 'price','URL' => 'url'];
    // foreach ($fields as $key => $value) {
    //     if(!empty($_POST[$value])) {
    //         if($fields[$key] !== 'price' || (is_numeric($_POST[$value]) && $_POST[$value] > .00)){
    //             $fields[$key] = $_POST[$value];
    //         }else{
    //             $errors[] = $key ." must be a non-negative number";
    //         }
                
    //     }else{
    //         $errors[] = $key . " is a reqired field";
    //     }
    // }
    if(!empty($_POST['name'])) {
        $name = $_POST['name'];
    }else{
        $errors[] = "Product Name is a reqired field";
    }
    if(!empty($_POST['description'])) {
        $description = $_POST['description'];
    }else{
        $errors[] = "Description is a reqired field";
    }
    if(!empty($_POST['price'])) {
        if(is_numeric($_POST['price']) && $_POST['price'] > .00){
            $price = $_POST['price'];
        }else{
            $errors[] = "Price must be a non-negative number";
        }
    }else{
        $errors[] = "Price is a reqired field";
    }
    if(!empty($_POST['url'])) {
        $url = $_POST['url'];
    }else{
        $errors[] = "URL is a reqired field";
    }
    if(!empty($name) && !empty($description) && !empty($price) && !empty($url)){
        try {
        $insert = "INSERT INTO items (`name`,`description`,`price`,`url`) VALUES (:name,:description,:price,:url)";
        $statement = database::getInstance()->getDB()->prepare($insert);
        $statement->bindValue('name', $name);
        $statement->bindValue('description', $description);
        $statement->bindValue('price', $price);
        $statement->bindValue('url', $url);
        $statement->execute();
        $submitted = $name . " was successfully added";
        } catch (PDOException $e) {
            $errors[] = "Something went wrong " . $e->getMessage();
        }
    }
}

?>