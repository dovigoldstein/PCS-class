<?php require_once 'top.php'; ?> 
<div class="row justify-content-around">
<?php include 'errorsView.php'?>
<?php if(empty($errors) && !empty($items)) :?>
    <?php foreach($items as $item) :?>
        <div class="card col-5" style="width: 20rem;">
            <img class="card-img-top" src="<?= $item['url'] ?>" alt="Card image cap">
            <div class="card-block">
                <h4 class="card-title"><?= $item['name'] ?></h4>
                <p class="card-text"><?= $item['description'] ?></p>
                <h5>$<?= number_format($item['price'], 2) ?></h5>
            </div>
        </div>
    <?php endforeach ?>
<?php endif ?>
</div>
<?php require_once 'bottom.php' ?>