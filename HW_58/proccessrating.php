<?php
    $name = '';
    $email = '';
    $age = '';
    $rating = '';

    if(isset($_POST['name'])) {
        if(empty($_POST['name'])){
            $errors[] = "Name is a required field";
        }else{
            $name = $_POST['name'];
        }
    } else {
        $errors[] = "Name is a required field";
    }
    if(isset($_POST['email'])) {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid email format";
        }else{
            $email = $_POST['email'];
        }

    } else {
        $errors[] = "Email is a required field";
    }
    if(isset($_POST['age'])) {
        if(! is_numeric($_POST['age']) || $_POST['age'] < 1 || $_POST['age'] > 120) {
            $errors[] = "Age must be a number between 1 and 120";
        }else{
            $age = $_POST['age'];
        }
    } else {
        $errors[] = "Age is a required field";
    }
    if(isset($_POST['rating'])) {
        if(! is_numeric($_POST['rating']) || $_POST['rating'] < 1 || $_POST['rating'] > 10) {
            $errors[] = "Rating must be a number between 1 and 10";
        }else{
            $rating = $_POST['rating'];
        }
    }
    if(empty($errors)) {
        $verifiedName = $name;
        $verifiedEmail = $email;
        $verifiedAge = $age;
        $verifiedRating = $rating;
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
        .well:first-of-type {
            background-color: transparent;
            border: none;
            box-shadow: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="jumbotron text-center">
            <h1>Thank You for Contacting Us!</h1>
        </div>
        <?php if (isset($errors)) : ?>
            <div class="well text-danger">
                <ul>
                    <?php foreach($errors as $error) : ?>
                        <li><?= $error ?></li>
                    <?php endforeach ?>
                </ul>
            </div>
            <?php endif ?>
        <div>
            <div class="row">
                <div class="well col-sm-2 text-right">Name</div>
                <div class="col-sm-8 well"><?= $name  ?></div>
            </div>
            <div class="row">
                <div class="well col-sm-2 text-right">Email</div>
                <div class="col-sm-8 well"><?= $email ?></div>
            </div>
            <div class="row">
                <div class="well col-sm-2 text-right">Age</div>
                <div class="col-sm-8 well"><?= $age ?></div>
            </div>
            <div class="row">
                <div class="well col-sm-2 text-right">Rating</div>
                <div class="col-sm-8 well"><?= $rating?></div>
            </div>
        </div>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>

</html>