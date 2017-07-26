<?php
    if($_SERVER['REQUEST_METHOD'] === "POST"){
        if(empty($_POST['name']) ){
            $errors[] = "Name is a required field";
        }elseif(strlen($_POST['name']) > 255){
            $errors[] = "Name must be less than 255 characters";
        }else{
            $name = $_POST['name'];
        }
        
        if(! empty($_POST['price'])) {
            if(! is_numeric($_POST['price']) || $_POST['price'] < .01) {
                $errors[] = "Please enter a valid price in dollars";
            }else{
                $price = $_POST['price'];
            }
        } else {
            $errors[] = "Price is a required field";
        }

        if(empty($_POST['category']) ){
            $errors[] = "Category is a required field";
        }elseif(strlen($_POST['category']) > 255){
            $errors[] = "Category must be less than 255 characters";
        }else{
            $category = $_POST['category'];
        }
    }
    if(isset($name,$price,$category)){
        include 'models/add_sefer_model.php';
    }
    include 'views/add_sefer_view.php';
?>