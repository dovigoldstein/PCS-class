<?php
    include 'models/index_init_model.php';
    if($_SERVER['REQUEST_METHOD'] === "POST") {
        include 'models/index_proc_model.php';
    }
    include 'views/index_view.php';
?>