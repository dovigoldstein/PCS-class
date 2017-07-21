<?php include 'top.html'; ?>

<div class="jumbotron text-center">
    <h1>Seforim Depot</h1>
    <h2>Sefer Price Finder</h2>
    <a class="btn btn-success"href="add_sefer_controller.php">Add a Sefer</a>
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
