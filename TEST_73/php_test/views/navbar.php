<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">PHP TEST</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <?php if (!empty($_SESSION['admin'])) : ?>
                <li class="nav-item col offset-md-2">
                    <a class="nav-link" href="index.php?action=products">Products</a>
                </li>
                <li class="nav-item col offset-md-1">
                    <a class="nav-link" href="index.php?action=addProducts">Add</a>
                </li>
            <?php endif ?>
        </ul>
        <?php if (!empty($_SESSION['username'])) : ?>
        <div class="my-2 my-lg-0">
            <span class="navbar-text">Logged in as <?= $_SESSION['username'] ?></span>
            <a class="btn btn-outline-success my-2 my-sm-0" href="index.php?action=logout">Logout</a>
        </div>
        <?php endif ?>
    </div>
</nav>