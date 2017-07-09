<?php
    

    function monthOptions(){
        $months=[
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "July",
            "August",
            "September",
            "October",
            "November",
            "December"
        ];
        foreach($months as $month){
            $options .= "<option value= $month>$month</option>";
        }
        return $options;
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
            <h1>Days in Month Calculator</h1>
        </div>
    <form class="form-horizontal" action="daysinmonth.php" method="post">
        <div class="form-group">
            <label for="font" class="control-label">Select Month</label>
            <select name="month" id="month" class="form-control">
                <?= monthOptions()?>
            </select>
        </div>
        <div class="form-group">
            <label for="font" class="control-label">Select Year</label>
            <select name="year" id="year" class="form-control">
                <?php for($i = 1582; $i < 2501; $i++) : ?>
                <option value="<?= $i ?>"
                <?php if ($i === 2017) echo "selected"?>
                ><?= $i ?>
                </option>
                <?php endfor ?>
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>