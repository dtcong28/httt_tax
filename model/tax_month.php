<?php
class tax_month_model { 
    public static function list_department(){
        $db = Db::getInstance();
        $sql = " SELECT * FROM department ";
        $stmt = $db->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        $results = $stmt->fetchAll();
        return $results;
    }
    public static function add($data){
        $db = Db::getInstance();
        $sql = " INSERT INTO `user` (`ho`,`ten`,`luong`,`thoi_gian`,`tien_bao_hiem`,`so_nguoi_phu_thuoc`,`thue_TNCN`,`department_id_phong_ban`) 
               VALUES (TRIM('$data->first_name'),TRIM('$data->last_name'),'$data->salary','$data->time','$data->insurrance','$data->dependent_person','$data->tax','$data->department')";
        $db->exec($sql);
    }
    public static function list(){
        $db = Db::getInstance();
        $sql = " SELECT * FROM user INNER JOIN department ON user.department_id_phong_ban = department.id_phong_ban";
        $stmt = $db->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        $results = $stmt->fetchAll();
        return $results;
    }
    public static function delete($data){
        $db = Db::getInstance();
        $sql =  "DELETE FROM `user` WHERE `user`.`id_user` = $data";
        $db->exec($sql);
    }
    public static function import_from_excel(){
        
    }
}
?>