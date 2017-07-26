<?php include 'top.html'; ?>

<div class="jumbotron text-center">
    <h1>Seforim Depot</h1>
    <h2>Sefer Price Finder</h2>
    <a class="btn btn-success"href="index.php?action=add_sefer">Add a Sefer</a>
</div>
<div class="row">
    <div class="col-sm-4">
        <div class="well">Filters</div>
        <form action="index.php">
            <div class="well"> 
                <?php foreach ($categories as $cat) : ?>
                <div class="checkbox text-capitalize">
                    <label>
                        <input type="checkbox" name="category" value="<?= $cat ?>"
                        <?php if(isset($category) && $cat === $category) echo "checked" ?>>
                        <?= $cat ?>
                    </label>
                </div>
                <?php endforeach ?>
                <button type="submit" class="btn btn-primary">filter</button>
            </div>
        </form>
    </div>
    <div class="col-sm-8">
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
    </div>    
</div>

<?php include 'bottom.html' ?>
