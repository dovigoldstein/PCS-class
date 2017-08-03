<?php
    //include 'housesModel.php';
    $styles = "
        .house img {
            width: 206px;
            height: 150px;
        }

        .cheap {
            color: red;
        }

        .cheap::before {
            content: \"ONLY \";
        }

        .cheap::after {
            content: \" !!\"
        }
    ";
    include 'top.php';
?>
    <div class="row">
        <?php include 'filters.php' ?>

        <div class="col-sm-9">
            <?php foreach($houses as $house) :?>
                <a href="index.php?action=details&houseId=<?= $house['id'] ?>">
                    <div class="col-md-3 col-sm-4 house">
                        <figure>
                            <img src="<?= $house['picture'] ?>" alt="picture of the house"/>
                        </figure>
                        <figcaption class="text-center">
                            <h3 
                                <?php if($house['price'] < 1500000) echo "class=\"cheap\""?>
                            ><?= number_format($house['price'], 2) ?></h3>
                            <h4><?= $house['address'] ?></h4>
                            <h5><?= "{$house['city']}, {$house['state']} {$house['zip']}"?></h5>
                        </figcaption>
                    </div>
                </a>
            <?php endforeach ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-offset-6 col-sm-3">
            <a href="<?php if($offset >= 4) echo getLink(['offset' => ($offset - 4)]);?>" 
            class="btn btn-default <?php if(!$offset >= 4) echo 'disabled';?>">Previous</a>
        </div>
        <div >                                 
            <a href="<?php if($offset <= (count($houses)-4)) echo getLink(['offset' => ($offset + 4)]);?>" 
            class="btn btn-default <?php if(!$offset <= (count($houses)-4))echo 'disabled';?>">Next</a>
        </div>
    </div>
      
<?php
include 'bottom.php';
?>