<?php
    $cs = "mysql:host=localhost;dbname=seforim_store";
    $user = "user";
    $password = 'password';
    $seforim = [];
    try {
        $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
        $db = new PDO($cs, $user, $password, $options);
        $query = "SELECT * FROM seforim";
        $results = $db->query($query);
        $seforim = $results->fetchall();
        // print_r($seforim);
    }catch(PDOException $e) {
        die("Something went wrong " . $e->getMessage());
    }

    foreach($seforim as $sefer){
        $seferArray[]=$sefer['id'];     
    }
    if(isset($_GET['id'])){
        if(!empty($_GET['id'])){
            if(in_array($_GET['id'],$seferArray)){
                $seferID = $_GET['id'];
                try {
                    $query2 = "SELECT name,price FROM seforim WHERE id = '{$seferID}' ";
                    $results2 = $db->query($query2);
                    $seferInfo = $results2->fetch();
                }catch(PDOException $e) {
                    die("Something went wrong " . $e->getMessage());
                }

                // foreach($seforim as $sefer){
                //     if ($sefer['name'] === $_GET['sefer'])
                //         $seferPrice = $sefer['price'];    
                // }
            }else{
                echo "That is not a sefer";
            }
        }else{
            echo "sefer is a required field";
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
            <h2>Sefer Price Finder</h2>
        </div>
        <?php if(!empty($seferInfo)):?>
        <h2 class="text-capitalize"><?= $seferInfo['name'] . " $" . $seferInfo['price'] ?></h2>
        <?php endif ?>
        <form class="form-horizontal">
            <div class="form-group">
                <label for="id" class="control-label">Select a Sefer</label>
                <select name="id" id="id" class="form-control text-capitalize">
                <?php foreach($seforim as $sefer):?>
                <option class="text-capitalize"value=<?=$sefer['id']?>><?=$sefer['name']?></option>
                <?php endforeach ?>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-success"href="add_sefer.php">Add a Sefer</a>
            </div>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>