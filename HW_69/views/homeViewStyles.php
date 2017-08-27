<?php
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
?>