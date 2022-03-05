<?php
class summary_model
{
    public static function list_department(){
        $db = Db::getInstance();
        $sql = " SELECT * FROM department";
        $stmt = $db->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        $results = $stmt->fetchAll();
        return $results;
    }

    public static function filter_tax_by_department_time($data){
        $db = Db::getInstance();
        $sql = " SELECT * FROM user WHERE user.department_id_phong_ban = '$data->id_department' AND ( thoi_gian BETWEEN '$data->start_time' AND '$data->end_time')";
        $stmt = $db->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        $results = $stmt->fetchAll();
        return $results;
    }
    public static function list_user(){
        $db = Db::getInstance();
        $sql = " SELECT DISTINCT  user.ho, user.ten FROM user";
        $stmt = $db->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        $results = $stmt->fetchAll();
        return $results;
    }
    public static function filter_tax_by_user_time($data){
        $db = Db::getInstance();
        $sql = " SELECT * FROM user WHERE CONCAT(TRIM(user.ho),' ',TRIM(user.ten)) = TRIM('$data->name') AND ( thoi_gian BETWEEN '$data->start_time' AND '$data->end_time') ";
        $stmt = $db->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        $results = $stmt->fetchAll();
        return $results;
    }

}