
<?php
    if(!empty($_GET["color"])) {
        $color = $_GET["color"];
    }else{
        $color = "black";
    }
    
    if(!empty($_GET["font"])) {
        $font = $_GET["font"];
    }else{
        $font = "helvetica";
    }
    $fonts= [
        "helvetica",
        "arial",
        "times new roman",
        "comic sans"
    ];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style>  
        body {
            color: <?= $color ?>;
            font-family:<?= $font?>;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#theLinks" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">PCS</a>
            </div>
            <div class="collapse navbar-collapse" id="theLinks">
                <ul class="nav navbar-nav">
                    <li><a class="btn"href="page2.php">Two</a></li>
                    <li><a class="btn"href="page3.php">Three</a></li>
                    <li><a class="btn"href="page4.php">Four</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="jumbotron text-center">
            <h1>PCS</h1>
        </div>
    <form class="form-horizontal">
        <div class="form-group">
            <label for="color" class="control-label">Text Color</label>
            <input type="color" class="form-control" id="color" name="color" value=<?= $color ?>>
        </div>
        <div class="form-group">
            <label for="font" class="control-label">Font</label>
            <select name="font" id="font">
                <?php foreach($fonts as $font1) : ?>
                <option value="<?= $font1 ?>"
                <?php if ($font === $font1) echo "selected"?>
                ><?= $font1 ?>
                </option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>