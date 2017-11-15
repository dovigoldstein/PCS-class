<?php
    class database{
        private $db;
        private static $instance;
        private function __construct(){
            $settings = parse_ini_file("../settings.ini");
            $dbname = $settings['dbname'];
            $cs = "mysql:host=localhost;dbname=" . $dbname;
            $user = $settings['user'];
            $password = $settings['password'];
            try {
                $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
                $this->db = new PDO($cs, $user, $password, $options);
            } catch (PDOException $e) {
                $error = "Something went wrong " . $e->getMessage();
            }
        }
        public static function getInstance(){
            if(self::$instance === null){
                self::$instance = new database();
            }
            return self::$instance;
        }
        public function getDB(){
            return $this->db;
        }
    }
?>