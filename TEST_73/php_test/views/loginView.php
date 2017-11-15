<?php require_once 'top.php' ?>
<form method="post">
    <h3 class="text-center">Please Log In</h3>
    <?php include 'errorsView.php'?>
    <div class="form-group">
        <label for="username">User Name</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="Enter Name" required>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
</form>
<?php require_once 'bottom.php' ?>
