<?php
require "httpsonly.php";
require_once 'Identifier.php';
?>
<?php include 'top.php' ?>
    <nav class="navbar navbar-light bg-light">
        <form action="log_in.php" method="post">
            <input type="hidden" name="logged_in" value= false>
            <button class="btn btn-outline-danger" type="submit">Log Out</button>
        </form>
    </nav>
    <div class="jumbotron text-center">
        <h1>Secure Info</h1>
    </div>
    <div class="container">
       
    </div>
<?php include 'bottom.php' ?>