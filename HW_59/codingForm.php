<?php
    $name  = "";
    $years = "";
    $language ="";

    $languages=["php","python","sql","javascript","java"];

    if($_SERVER['REQUEST_METHOD'] === "POST") {
        if(isset($_POST['name'])) {
            if(empty($_POST['name'])){
                $errors[] = "Name is a required field";
            }
            $name = $_POST['name'];
        } else {
            $errors[] = "Name is a required field";
        }
        if(isset($_POST['years'])) {
            if(! is_numeric($_POST['years']) || $_POST['years'] < 1 || $_POST['years'] > 50) {
                $errors[] = "Years Programming must be a number between 0 and 50";
            }
            $years = $_POST['years'];
        } else {
            $errors[] = "Years is a required field";
        }
        if(isset($_POST['language'])) {
            $langs= array_map('trim',explode(',',$_POST['language']));
            foreach($langs as $lang){
                if(!in_array(strtolower($lang), $languages)) {
                    $errors[] = "Unrecognized Favorite Programming Language(s)";
                }
            }
            $language = $_POST['language'];
        } else {
            $errors[] = "Favorite Programming Language is a required field";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style>
        .well{
            background-color: transparent;
            border: none;
            box-shadow: none;
        }
        span p{
            display:inline-block;
        }
        
    </style>
</head>

<body>
    <div class="container">
        <div class="jumbotron text-center">
            <h1>Your Coding Data</h1>
        </div>

        <form class="form-horizontal" method="post">
            <?php if (isset($errors)) : ?>
            <div class="well text-danger">
                <ul>
                    <?php foreach($errors as $error) : ?>
                        <li><?= $error ?></li>
                    <?php endforeach ?>
                </ul>
            </div>
            <?php endif ?>
            <div class="form-group">
                <label for="name" class="col-sm-3 control-label">Name</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" required
                        value="<?= $name ?>"
                    >
                </div>
            </div>
            <div class="form-group">
                <label for="years" class="col-sm-3 control-label">Years Programming</label>
                <div class="col-sm-9">
                    <input type="number" min="0" max="50" class="form-control" id="years" name="years" placeholder="Years" required
                        value="<?= $years ?>"
                    >
                </div>
            </div>
            <div class="form-group">
                <label for="language" class="col-sm-3 control-label">Favorite Programming Language</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="language" name="language" placeholder="PHP, Java, etc." required
                        value="<?= $language ?>"
                    >
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <?php if(!isset($errors) && $_SERVER['REQUEST_METHOD'] === "POST"): ?>
                    <span class="well text-primary">
                        <p>Thank you for submitting your data</p>
                    </span>
                    <?php endif ?>
                </div>
            </div>
        </form>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>

</html>