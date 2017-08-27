<?php
    function getTd($value, $houseId) {
        $it = "<td><a href=\"index.php?action=details&houseId=$houseId\">$value</a></td>";
        return $it;
    }

    $prev_link = ['action'=>'table'];
    if($offset >= 4)
        array_push($prev_link, $prev_link['offset'] = $offset - 4);
    $next_link = ['action'=>'table'];
    if($offset <= (count($houses)-4))
        array_push($next_link, $next_link['offset'] = $offset + 4);

    $styles = "
        .house img {
            width: 131.24px;
            height: 98px;
        }
    ";
    include 'top.php';
?>
    <div class="row">
        <?php include 'filters.php' ?>

        <div class="col-sm-9">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Price</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Zip</th>
                        <th>Picture</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($houses as $house) :?>
                    <tr class="house">
                        <?= getTd(number_format($house['price'], 2), $house['id']) ?>
                        <?= getTd($house['address'], $house['id']) ?>
                        <?= getTd($house['city'], $house['id']) ?>
                        <?= getTd($house['state'], $house['id']) ?>
                        <?= getTd($house['zip'], $house['id']) ?>
                        <td><a href="houseDetailsController.php?houseId={$house['id']}"><img src= "<?= $house['picture'] ?>" alt="the house"/></a></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <div class="row">
                <div class="col-sm-offset-3 col-sm-3">
                    <a href="<?= getLink($prev_link) ?>" class="btn btn-default">Previous</a>
                </div>
                <div >
                    <a  href="<?= getLink($next_link) ?>" class="btn btn-default">Next</a>
                </div>
            </div>
        </div>
    </div>
<?php
include 'bottom.php';
?>