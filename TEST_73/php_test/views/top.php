<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <style>
        <?php if (!empty($_SESSION['username'])) echo "body {padding-top: 54px; padding-bottom: 54px;}"?>
    </style>
  </head>
    <body>
    <?php if (!empty($_SESSION['username'])) include 'navbar.php' ?>
        <div class="jumbotron text-center alert-primary">
            <h1>PHP TEST</h1>
            <?php if(!empty($pageName)) echo "<h4>$pageName</h4>" ?>
        </div>
        <div class="container">