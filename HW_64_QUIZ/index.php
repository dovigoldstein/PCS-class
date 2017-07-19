<?php
    try {
        $db = new PDO("mysql:host=localhost;dbname=students", "user", 'password',[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        } catch (PDOException $e) {
            $systemError = "ERROR: " . $e->getMessage();
        }
    if(! empty($_POST['student'])){
        try {
            $delete = "DELETE FROM `tests` WHERE `name`= ? ";
            $statement = $db->prepare($delete);
            $statement->bindValue(1,$_POST['student']);
            $statement->execute();
            } catch (PDOException $e) {
                $systemError = "ERROR: " . $e->getMessage();
            }
    }
    try {
    $query = "SELECT a.name,a.score as score1, b.score as score2
            FROM tests A, tests B
            WHERE a.id <> b.id
            AND a.name = b.name
            GROUP BY a.name";
            $statement = $db->prepare($query);
            $statement->execute();
            $students = $statement->fetchall(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        $systemError = "ERROR: " . $e->getMessage();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="jumbotron text-center">
            <h1>Quiz</h1>
        </div>
        <table class="table table-striped table-hover">
            <caption>
                <h3 class="text-center">Student Test Scores</h3>
            </caption>
            <thead>
                <tr>
                    <th>Select 1</th>
                    <th>Student</th>
                    <th>Grade 1</th>
                    <th>Grade 2</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($students as $student) : ?>
                <form method="post">
                    <tr>
                        <td><input type="radio" name="student" value="<?=$student['name'] ?>" ></td>
                        <?php foreach($student as $attribute) : ?>
                        <td><?=$attribute?></td>
                        <?php endforeach ?>
                    </tr>
                
                <?php endforeach ?>
            </tbody>
        </table>
                    <button type="submit" class="btn btn-danger">Delete</button>
                <form >

            
        <?php if(!empty($systemError)) : ?>
        <span class="text-danger">
        <?= $systemError?>
        <?php endif ?>
        </span>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>