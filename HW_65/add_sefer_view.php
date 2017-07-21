<?php include 'top.html'; ?>

<div class="jumbotron text-center">
    <h1>Seforim Depot</h1>
    <h2>Add a Sefer</h2>
    <a class="btn btn-success"href="index_controller.php">Go Back</a>
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