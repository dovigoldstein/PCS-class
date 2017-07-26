<?php
    if(!empty($_POST['id'])){
        if(isset($seforim)){
            foreach ($seforim as $sefer) {
                $isSefer = in_array($_POST['id'],$sefer);
                if($isSefer){break;}
            }
            if($isSefer){
                $seferID = $_POST['id'];
                if(isset($_POST['get_price'])){
                    try {
                        $query = "SELECT * FROM seforim WHERE id = ?";
                        $statement = $db->prepare($query);
                        $statement->bindValue(1, $seferID);
                        $statement->execute();
                        $seferInfo = $statement->fetch(PDO::FETCH_ASSOC);
                    }catch(PDOException $e) {
                        $systemError = "ERROR: " . $e->getMessage();
                    }
                }elseif(isset($_POST['delete'])){
                    try {
                        $delete = "DELETE FROM seforim WHERE id = ? ";
                        $statement = $db->prepare($delete);
                        $statement->bindValue(1,$seferID);
                        if($statement->execute()){
                            $deleted = "Deleted";
                            foreach ($seforim as $key => $sefer) {
                                if(in_array($_POST['id'],$sefer)){
                                    unset($seforim[$key]);
                                }
                            }
                        }
                    } catch (PDOException $e) {
                            $systemError = "ERROR: " . $e->getMessage();
                    }
            }
        }else{
            $error = "That is not a sefer";
        }
        }
        
    }else{
        $error = "sefer is a required field";
    }
?>