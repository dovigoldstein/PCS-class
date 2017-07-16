<?php
    include 'db.php';
    $seforim = [];
    try {
        $query = "SELECT * FROM seforim";
        $statement = $db->prepare($query);
        $statement->execute();
        $seforim = $statement->fetchall();
    }catch(PDOException $e) {
        $systemError = "ERROR: " . $e->getMessage();
    }

    foreach($seforim as $sefer){
        $seferArray[]=$sefer['id'];     
    }
    if(isset($_GET['id'])){
        if(!empty($_GET['id'])){
            if(in_array($_GET['id'],$seferArray)){
                $seferID = $_GET['id'];
                try {
                    $query = "SELECT * FROM seforim WHERE id = ?";
                    $statement = $db->prepare($query);
                    $statement->bindValue(1, $seferID);
                    $statement->execute();
                    $seferInfo = $statement->fetch();
                }catch(PDOException $e) {
                    $systemError = "ERROR: " . $e->getMessage();
                }
            }else{
                $error = "That is not a sefer";
            }
        }else{
            $error = "sefer is a required field";
        }
    }
    
    include 'top.html';
?>

        <div class="jumbotron text-center">
            <h1>Seforim Depot</h1>
            <h2>Sefer Price Finder</h2>
        </div>
        <?php if(!empty($error)) : ?>
            <p class="alert text-danger"><?=$error?></p>
        <?php endif ?>
        <form class="form-horizontal">
            <div class="form-group">
                <label for="id" class="control-label">Select a Sefer</label>
                <select name="id" id="id" class="form-control text-capitalize">
                <?php foreach($seforim as $sefer):?>
                <option class="text-capitalize" value=<?= $sefer['id'] ?>
                <?php if (!empty($seferInfo) && $sefer['id'] == $seferInfo['id']) echo "selected" ?>
                ><?= $sefer["name"] ?></option>
                <?php endforeach ?>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Get Price</button>
                <a class="btn btn-success"href="add_sefer.php">Add a Sefer</a>
            </div>
        </form>
        <?php if(!empty($seferInfo)):?>
        <h3 class="text-capitalize text-success"><?= $seferInfo['name'] . " - $" . $seferInfo['price'] ?></h3>
        <?php elseif(!empty($systemError)) : ?>
        <p class="text-danger"><?= $systemError?></p>
        <?php endif ?>
<?php include 'bottom.html' ?>