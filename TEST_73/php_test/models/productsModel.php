<?php
require_once 'utils/query.php';
$query = new query(array('*'),'items');
$items = $query->getResult();
if(!empty($query->getError())){
    $errors[] = $query->getError();
}
?>