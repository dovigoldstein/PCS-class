<?php
    $selectedMonth = $_POST['month'];
    $selectedYear = $_POST['year'];
    function daysInMonth($month){
        $months=[
            "January" => 31,
            "March" => 31,
            "April" => 30,
            "May" => 31,
            "June" => 30,
            "July" => 31,
            "August" => 31,
            "September" => 30,
            "October" => 31,
            "November" => 30,
            "December" => 31
        ];
        foreach ($months as $key => $value) {
            if($month === $key){
                return $value;
            }
        }
    }

    function isleapYear($year){
        $numDays= 28;
        if(($year % 4 === 0) && !($year % 100 === 0) || ($year % 400 === 0)){
            $numDays= 29;
        }
        return $numDays;
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
        <h1><?php echo $selectedMonth .", ". $selectedYear . "<br> has ";
             if($selectedMonth !== "February"){
                echo daysInMonth($selectedMonth);
             }else{
                echo isleapYear($selectedYear);
             }
            ?> days</h1>
        </div>
    </div>
</body>
</html>