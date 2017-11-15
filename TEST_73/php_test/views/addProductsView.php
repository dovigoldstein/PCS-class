<?php 
require_once 'top.php';
include 'errorsView.php'
?>
<?php if(!empty($submitted)) : ?>
    <div class="alert alert-success text-center">
        <h4><?= $submitted?></h4>
    </div>
<?php endif ?>
<form method="post">
    <div class="form-group">
        <label for="name">Product Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" maxlength="100" 
        <?php if(isset($name) && !empty($errors)) echo "value = $name"?>>
        <small id="nameHelp" class="form-text text-muted">Maximum 100 characters</small>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <input type="text" class="form-control" id="description" name="description" placeholder="Enter Description" maxlength="1000"
        <?php if(isset($description) && !empty($errors)) echo "value = $description"?>>
        <small id="nameHelp" class="form-text text-muted">Maximum 1000 characters</small>
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <div class="input-group">
            <div class="input-group-addon">$</div>
            <input type="number" step=".01" min=".01" class="form-control" id="price" name="price" placeholder="Enter Price" 
            <?php if(isset($price) && !empty($errors)) echo "value = $price"?>>
        </div>
    </div>
    <div class="form-group">
        <label for="url">URL (image)</label>
        <input type="text" class="form-control" id="url" name="url" placeholder="Enter URL" maxlength="255" 
        <?php if(isset($url) && !empty($errors)) echo "value = $url"?>>
        <small id="nameHelp" class="form-text text-muted">Maximum 255 characters</small>
    </div>
    <button type="submit" class="btn btn-primary" id="target">Add Product</button>
</form>
<?php require_once 'bottom.php' ?>