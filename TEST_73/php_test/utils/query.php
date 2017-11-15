<?php
require_once 'db.php';
class query{
    private $table;
    private $cols;
    private $where;
    private $result;
    private $error;

    public function __construct($cols,$table,$where = NULL){
            $this->table = $table;
            $this->cols = join(',',$cols);
            $this->where = $where;
    }

    public function getResult(){
        $db = database::getInstance()->getDb();
        $query = "SELECT $this->cols FROM $this->table";
        if(isset($this->where)){
            $query .= " WHERE {$this->where}";
        }
        $statement = $db->prepare($query);
        if(isset($this->where)){
            $statement->bindValue(1,"{$this->where}");
        }
        try {
            $statement->execute();
            $this->result = $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e){
            $this->error = $e->getMessage();
        }
        return $this->result;
    }
    public function getError(){
        return $this->error;
    }

}
?>