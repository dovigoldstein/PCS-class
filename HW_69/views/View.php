<?php
    class View {
        public function render_page(){}
        public function render(){
            global $styles;
            global $action;
            global $houses;
            include 'top.php';
            $this->render_page();
            include 'bottom.php';
        }
    }

?>