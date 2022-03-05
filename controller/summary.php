<?php
class summary{
    public static function index(){
        require_once("view/summary/index.php");
    }
    public static function by_department(){
        if(!empty($_POST)){
            $data = new summary_model();
            $data->id_department = $_POST['department'];
            $data->start_time = $_POST['start_time'];
            $data->end_time = $_POST['end_time'];
            $filter_data = summary_model::filter_tax_by_department_time($data);
            require_once("view/summary/by_department.php");
        }else{
            $data = summary_model::list_department();
            require_once("view/summary/by_department.php");
        }
    }
    public static function by_user(){
        if(!empty($_POST)){
            $data = new summary_model();
            $data->name = $_POST['employee'];
            $data->start_time = $_POST['start_time'];
            $data->end_time = $_POST['end_time'];
            $filter_data = summary_model::filter_tax_by_user_time($data);
            require_once("view/summary/by_user.php");
        }else{
            $data = summary_model::list_user();
            require_once("view/summary/by_user.php");
        }
    }
}
?>