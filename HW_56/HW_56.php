<?php
    $name1 = "George W. Bush";
    $year1 = 2000;
    $name2 = "Barack Obama";
    $year2 = 2008;
    $name3 = "Donald Trump";
    $year3 = 2016;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>php homework</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <table class="table table-striped table-hover">
            <caption>
                <h3 class="text-center">Presidents- Year Elected</h3>
            </caption>
            <thead>
                <tr>
                    <th>President</th>
                    <th>Year</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $name1 ?></td>
                    <td><?= $year1 ?></td>
                </tr>
                <tr>
                    <td><?= $name2 ?></td>
                    <td><?= $year2 ?></td>
                </tr>
                <tr>
                    <td><?= $name3 ?></td>
                    <td><?= $year3 ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>