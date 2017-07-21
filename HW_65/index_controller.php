<?php
    include 'index_init_model.php';
    if($_SERVER['REQUEST_METHOD'] === "POST") {
        include 'index_proc_model.php';
    }
    include 'index_view.php';
?>