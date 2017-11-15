<?php
require_once 'db.php';
class Identifier{
    private static $instance;
    private $user_name = '';
    private $password = '';
    private function __construct() {}
    public function verify(){
        session_start();
        if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true){
            if($_SERVER['REQUEST_METHOD'] === "POST"){
                if(!empty($_POST['user_login']) && !empty($_POST['password_login'])){
                    $this->user_name = $_POST['user_login'];
                    $this->password = $_POST['password_login'];
                }
            }
            try {
                $query = "SELECT `password` FROM passwords WHERE `user_name` = :user_name";

                $statement = database::getInstance()->getDB()->prepare($query);
                $statement->bindValue('user_name', $this->user_name);

                $statement->execute();
                $result = $statement->fetch(PDO::FETCH_COLUMN);
                $statement->closeCursor();
            } catch (PDOException $e) {
                $error = "Something went wrong " . $e->getMessage();
            }
            if(isset($result)){
                $hashed_password = $result;
            }
            if(!isset($hashed_password) || !password_verify($this->password, $hashed_password)) {
                header("Location: log_in.php");
                exit;
            }
            $_SESSION['logged_in'] = true;
        }
    }
    public static function getInstance() {
            if(empty(Identifier::$instance)) {
                Identifier::$instance = new Identifier();
            }
            return Identifier::$instance;
        }
}
Identifier::getInstance()->verify();
?>