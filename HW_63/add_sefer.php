<?php
    if($_SERVER['REQUEST_METHOD'] === "POST"){
        if(isset($_POST['name'])) {
            if(empty($_POST['name']) ){
                $errors[] = "Name is a required field";
            }elseif(strlen($_POST['name']) > 255){
                $errors[] = "Name must be less than 255 characters";
            }else{
                $name = $_POST['name'];
            }
        } else {
            $errors[] = "Name is a required field";
        }
        if(isset($_POST['price'])) {
            if(! is_numeric($_POST['price'])) {
                $errors[] = "Please enter a valid price in dollars";
            }else{
                $price = $_POST['price'];
            }
        } else {
            $errors[] = "Price is a required field";
        }
    }
    if(isset($name,$price)){
        try {
            $db = new PDO("mysql:host=localhost;dbname=seforim_store", "user", 'password',[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
                $insert = "INSERT INTO `seforim`(`name`, `price`) VALUES (?,?)";
                $statement = $db->prepare($insert);
                $statement->bindValue(1,$name);
                $statement->bindValue(2,$price);
                $statement->execute();
                $submitted = $name . " $" .number_format($price,2) . " has been added successfully ";
            } catch (PDOException $e) {
                $errors[] = "Something went wrong " . $e->getMessage();
            }
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="jumbotron text-center">
            <h1>Seforim Depot</h1>
            <h2>Add a Sefer</h2>
        </div>
        <form class="form-horizontal" method="post">
            <div class="form-group">
                <label for="name" class="control-label">Enter Name</label>
                <input type="text" name="name" id="id" placeholder="Name" class="form-control" required/>
            </div>
            <div class="form-group">
                <label for="price" class="control-label">Enter Price</label>
                <div class="input-group">
                    <div class="input-group-addon">$</div>
                    <input type="number" step="0.01" name="price" id="price" placeholder="Amount" class="form-control"required/>
                </div>    
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Add Sefer</button>
            </div>
        </form>
        <?php if(!empty($submitted)) : ?>
            <h2 class="text-center">
                <?= $submitted?>
            </h2>
        <?php endif ?>

        <?php if(!empty($errors)) : ?>
            <h2 class="text-center alert alert-danger">something is wrong</h2>
        <?php endif ?>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>