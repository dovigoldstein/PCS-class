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
    }
    if(isset($name,$price)){
        include 'db.php';
        try {
            $db = new PDO("mysql:host=localhost;dbname=seforim_store", "user", 'password',[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
                $insert = "INSERT INTO `seforim`(`name`, `price`) VALUES (?,?)";
                $statement = $db->prepare($insert);
                $statement->bindValue(1,$name);
                $statement->bindValue(2,$price);
                $statement->execute();
                $submitted = $name . " $" .number_format($price,2) . " has been added successfully ";
            } catch (PDOException $e) {
                $systemError = "ERROR: " . $e->getMessage();
            }
    }
    include 'top.html';
?>

        <div class="jumbotron text-center">
            <h1>Seforim Depot</h1>
            <h2>Add a Sefer</h2>
        </div>
        <?php if(!empty($errors)) : ?>
            <ul >
                <?php foreach($errors as $error) : ?>
                <li class="alert text-danger"><?=$error?></li>
                <?php endforeach?>
            </ul>    
        <?php endif ?>
        <form class="form-horizontal" method="post">
            <div class="form-group">
                <label for="name" class="control-label">Enter Name</label>
                <input type="text" name="name" id="id" placeholder="Name" class="form-control" required/>
            </div>
            <div class="form-group">
                <label for="price" class="control-label">Enter Price</label>
                <div class="input-group">
                    <div class="input-group-addon">$</div>
                    <input type="number" min=".01"step="0.01" name="price" id="price" placeholder="Amount" class="form-control"required/>
                </div>    
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Add Sefer</button>
                <?php if(!empty($submitted)) : ?>
                    <span class="text-primary">
                        <?= $submitted?>
                    <?php elseif(!empty($systemError)) : ?>
                    <span class="text-danger">
                        <?= $systemError?>
                <?php endif ?>
                </span>
            </div>
        </form>
<?php include 'bottom.html' ?>