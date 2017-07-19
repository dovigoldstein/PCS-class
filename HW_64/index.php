<?php
    include 'db.php';
    $seforim = [];
    try {
        $query = "SELECT * FROM seforim";
        $statement = $db->prepare($query);
        $statement->execute();
        $seforim = $statement->fetchall(PDO::FETCH_ASSOC);     
    }catch(PDOException $e) {
        $systemError = "ERROR: " . $e->getMessage();
    }
    if($_SERVER['REQUEST_METHOD'] === "POST") {
            if(!empty($_POST['id'])){
                if(isset($seforim)){
                    foreach ($seforim as $sefer) {
                        $isSefer = in_array($_POST['id'],$sefer);
                        if($isSefer){break;}
                    }
                    if($isSefer){
                        $seferID = $_POST['id'];
                        if(isset($_POST['get_price'])){
                            try {
                                $query = "SELECT * FROM seforim WHERE id = ?";
                                $statement = $db->prepare($query);
                                $statement->bindValue(1, $seferID);
                                $statement->execute();
                                $seferInfo = $statement->fetch(PDO::FETCH_ASSOC);
                            }catch(PDOException $e) {
                                $systemError = "ERROR: " . $e->getMessage();
                            }
                        }elseif(isset($_POST['delete'])){
                            try {
                                $delete = "DELETE FROM seforim WHERE id = ? ";
                                $statement = $db->prepare($delete);
                                $statement->bindValue(1,$seferID);
                                if($statement->execute()){
                                    $deleted = "Deleted";
                                    foreach ($seforim as $key => $sefer) {
                                        if(in_array($_POST['id'],$sefer)){
                                            unset($seforim[$key]);
                                        }
                                    }
                                }
                            } catch (PDOException $e) {
                                    $systemError = "ERROR: " . $e->getMessage();
                            }
                    }
                }else{
                    $error = "That is not a sefer";
                }
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
            <a class="btn btn-success"href="add_sefer.php">Add a Sefer</a>
        </div>
        <?php if(!empty($error)) : ?>
            <p class="alert text-danger"><?=$error?></p>
        <?php endif ?>
        <form class="form-horizontal" method="post">
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
                <button type="submit" name="get_price" class="btn btn-primary">Get Price</button>
                <button type="submit" name="delete" class="btn btn-danger">Delete</button>
            </div>
        </form>
        <?php if(!empty($seferInfo)):?>
        <h3 class="text-capitalize text-success"><?= $seferInfo['name'] . " - $" . $seferInfo['price'] ?></h3>
        <?php elseif(!empty($deleted)) : ?>
        <p class="text-danger"><?= $deleted?></p>
        <?php elseif(!empty($systemError)) : ?>
        <p class="text-danger"><?= $systemError?></p>
        <?php endif ?>
<?php include 'bottom.html' ?>