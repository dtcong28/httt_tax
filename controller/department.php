<?php
class department
{
    public function index()
    {
        $values = department_model::list();
        require_once("view/department/index.php");
    }
    public function add()
    {
        if (!empty($_POST)) {
            $data = new department_model();
            $data->name = $_POST['name'];
            department_model::add($data);
            header("Location: /?controller=department&action=index");
        } else {
            require_once("view/department/add.php");
        }
    }
    public function delete()
    {
        $id = $_GET['id'];
        department_model::delete($id);
        header("Location: /?controller=department&action=index");
    }



    public function edit()
    {
        $id = $_GET['id'];
        $value = department_model::find_by_id($id);
        if (!empty($_POST)) {
            $data = new department_model();
            $data->id = $id;
            $data->name = $_POST['name'];
            department_model::edit($data);
            header("Location: /?controller=department&action=index");
        } else {
            require_once("view/department/edit.php");
        }
    }
}
