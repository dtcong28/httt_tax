<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

//use PhpOffice\PhpSpreadsheet\src\PhpSpreadsheet\Reader\Xlsx;
//use PhpOffice\PhpSpreadsheet\src\Spreadsheet;
class tax_month
{
    public static function index()
    {
        if (!empty($_POST)) {
            $data = new tax_month_model();
            $data->first_name = $_POST['first_name'];
            $data->last_name = $_POST['last_name'];
            $data->time = $_POST['time'];
            $data->department = $_POST['department'];
            $data->salary = $_POST['salary'];
            $data->insurrance = $_POST['insurrance'];
            $data->dependent_person = $_POST['dependent_person'];

            $dong_bao_hiem = $data->insurrance * (8 + 1.5 + 1) / 100;
            $giam_tru_ban_than = 11000000;
            $giam_tru_nguoi_phu_thuoc = $data->dependent_person * 4400000;
            $thu_nhap_chiu_thue = $data->salary - $dong_bao_hiem - $giam_tru_ban_than - $giam_tru_nguoi_phu_thuoc;
            $thue = 0;
            if ($thu_nhap_chiu_thue <= 0) {
                $thue = 0;
            } elseif ($thu_nhap_chiu_thue <= 5000000) {
                $thue = $thu_nhap_chiu_thue * 5 / 100;
            } elseif ($thu_nhap_chiu_thue <= 10000000) {
                $thue = $thu_nhap_chiu_thue * 10 / 100 - 250000;
            } elseif ($thu_nhap_chiu_thue <= 18000000) {
                $thue = $thu_nhap_chiu_thue * 15 / 100 - 750000;
            } elseif ($thu_nhap_chiu_thue <= 32000000) {
                $thue = $thu_nhap_chiu_thue * 20 / 100 - 1650000;
            } elseif ($thu_nhap_chiu_thue <= 52000000) {
                $thue = $thu_nhap_chiu_thue * 25 / 100 - 3250000;
            } elseif ($thu_nhap_chiu_thue <= 80000000) {
                $thue = $thu_nhap_chiu_thue * 30 / 100 - 5850000;
            } else {
                $thue = $thu_nhap_chiu_thue * 35 / 100 - 9850000;
            }

            $data->tax = $thue;
            tax_month_model::add($data);
            //header("Location: /?controller=tax_month&action=index&thue=$thue");
            require_once("view/tax_month/index.php");
        } else {
            $department = tax_month_model::list_department();
            require_once("view/tax_month/index.php");
        }
    }

    public static function list()
    {
        $values = tax_month_model::list();
        require_once("view/tax_month/list.php");
    }

    public function delete()
    {
        $id = $_GET['id'];
        tax_month_model::delete($id);
        header("Location: /?controller=tax_month&action=list");
    }

    public static function import_from_excel()
    {
        if (isset($_POST['Submit'])) {
            if (isset($_FILES['file']['name'])) {
                $arr_file = explode('.', $_FILES['file']['name']);
                $extension = end($arr_file);
                if ('xlsx' == $extension) {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                }
                $spreadsheet = $reader->load($_FILES['file']['tmp_name']);
                $sheetData = $spreadsheet->getActiveSheet()->toArray();

                if (!empty($sheetData)) {
                    //$data = null;
                    $data[] = new tax_month_model();
                    $department = tax_month_model::list_department();

                    for ($i = 1; $i < count($sheetData); $i++) {
                        $full_name = $sheetData[$i][0];

                        $parts = explode(" ", $full_name);
                        if(count($parts) > 1) {
                            $lastname = array_pop($parts);
                            $firstname = implode(" ", $parts);
                        }
                        else
                        {
                            $firstname = $full_name;
                            $lastname = " ";
                        }

                        $data[$i - 1]->first_name = $firstname;
                        $data[$i - 1]->last_name = $lastname;
                        $data[$i - 1]->salary = $sheetData[$i][1];
                        $data[$i - 1]->time = $sheetData[$i][2];
                        $data[$i - 1]->insurrance = $sheetData[$i][3];
                        $data[$i - 1]->dependent_person = $sheetData[$i][4];
                        $name_department = $sheetData[$i][5];

                        foreach ($department as $value) {
                            if ($value->name == $name_department) {
                                $data[$i - 1]->department = $value->id_phong_ban;
                                break;
                            }
                        }


                        $dong_bao_hiem = $data[$i - 1]->insurrance * (8 + 1.5 + 1) / 100;
                        $giam_tru_ban_than = 11000000;
                        $giam_tru_nguoi_phu_thuoc = $data[$i - 1]->dependent_person * 4400000;
                        $thu_nhap_chiu_thue = $data[$i - 1]->salary - $dong_bao_hiem - $giam_tru_ban_than - $giam_tru_nguoi_phu_thuoc;

                        if ($thu_nhap_chiu_thue <= 0) {
                            $thue = 0;
                        } elseif ($thu_nhap_chiu_thue <= 5000000) {
                            $thue = $thu_nhap_chiu_thue * 5 / 100;
                        } elseif ($thu_nhap_chiu_thue <= 10000000) {
                            $thue = $thu_nhap_chiu_thue * 10 / 100 - 250000;
                        } elseif ($thu_nhap_chiu_thue <= 18000000) {
                            $thue = $thu_nhap_chiu_thue * 15 / 100 - 750000;
                        } elseif ($thu_nhap_chiu_thue <= 32000000) {
                            $thue = $thu_nhap_chiu_thue * 20 / 100 - 1650000;
                        } elseif ($thu_nhap_chiu_thue <= 52000000) {
                            $thue = $thu_nhap_chiu_thue * 25 / 100 - 3250000;
                        } elseif ($thu_nhap_chiu_thue <= 80000000) {
                            $thue = $thu_nhap_chiu_thue * 30 / 100 - 5850000;
                        } else {
                            $thue = $thu_nhap_chiu_thue * 35 / 100 - 9850000;
                        }

                        $data[$i - 1]->tax = $thue;
                        tax_month_model::add($data[$i - 1]);
                    }
                    header("Location: /?controller=tax_month&action=list");
                }

            }


        } else {
            require_once("view/tax_month/import_from_excel.php");
        }
    }
}
