<?php
    $name1 = "George W. Bush";
    $year1 = 2001;
    $age1 = 71;
    $name2 = "Barack Obama";
    $year2 = 2009;
    $age2 = 55;
    $name3 = "Donald Trump";
    $year3 = 2017;
    $age3 = 70;

    $presidents_1=[
        [$name1,$year1],
        [$name2,$year2],
        [$name3,$year3]
    ];

    $presidents_2=[
        $pres=[
            "name" => $name1,
            "year" => $year1,
            "age" => $age1
        ],
        [
            "name" => $name2,
            "year" => $year2,
            "age" => $age2
        ],
        [
            "name" => $name3,
            "year" => $year3,
            "age" => $age3
        ]
    ];


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
                <?php
                    foreach($presidents_2 as $president) {
                        echo "<tr>";
                        foreach($president as $attribute){
                            echo "<td>$attribute</td>";
                        } 
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
        <table class="table table-striped table-hover table-bordered">
            <caption>
                <h3 class="text-center">Presidents- Year Elected</h3>
            </caption>
            
            <thead>
                <tr>
                    <?php
                        // $headers="";
                        // $tempheads="";
                        // foreach($presidents_2 as $president) {
                        //     foreach($president as $key => $value) {
                        //         $tempheads .= "<th>$key</th>";
                        //     }
                        //     if($tempheads > $headers)
                        //     {
                        //         $headers = $tempheads;
                        //     }
                        //     $tempheads="";   
                        // }
                        // echo $headers;
                        foreach($pres as $key => $value) {
                                echo"<th>$key</th>";
                            }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($presidents_2 as $president) {
                        echo "<tr>";
                        foreach($president as $attribute)
                            echo "<td>$attribute</td>";
                    }
                    echo "</tr>";
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>