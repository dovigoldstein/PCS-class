<?php
include 'utils/db.php';

if (empty($zip)) {
    $zip = '';
}

if (empty($min)) {
    $min = '';
}

if (empty($max)) {
    $max = '';
}

if(empty($offset)){
    $offset = 0;
}

try {
    $query = "SELECT * FROM houses WHERE (:zip = '' OR zip=:zip)
                                    AND (:min = '' OR price >= :min)
                                    AND (:max = '' OR price <= :max)
                                    LIMIT 4 OFFSET :offset";

    $statement = $db->prepare($query);
    $statement->bindValue('zip', $zip);
    $statement->bindValue('min', $min);
    $statement->bindValue('max', $max);
    $statement->bindValue('offset', (int)$offset, PDO::PARAM_INT);

    $statement->execute();
    $houses = $statement->fetchAll();
    $statement->closeCursor();
} catch (PDOException $e) {
    $error = "Something went wrong " . $e->getMessage();
}
?>