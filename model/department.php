<?php
class department_model {
    public static function add($data)
    {
        $db = Db::getInstance();
        $sql = " INSERT INTO `department` (`name`) 
               VALUES (TRIM('$data->name'))";
        $db->exec($sql);
    }
    public static function list(){
        $db = Db::getInstance();
        $sql = " SELECT * FROM department ";
        $stmt = $db->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        $results = $stmt->fetchAll();
        return $results;
    }
    public static function delete($data){
        $db = Db::getInstance();
        $sql =  "DELETE FROM `department` WHERE `department`.`id_phong_ban` = $data";
        $db->exec($sql);
    }
    public static function find_by_id($id)
    {
        $db = Db::getInstance();
        $sql = "SELECT * FROM `department` WHERE `department`.`id_phong_ban` = $id";
        $stmt = $db->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $results = $stmt->fetchAll();

        return $results[0];
    }
    public static function edit($data){
        $db = Db::getInstance();
        $sql = 
        "UPDATE `department` SET name = TRIM('$data->name') 
        WHERE `department`.`id_phong_ban` = $data->id";
        $db->exec($sql); 
    }
}

?>