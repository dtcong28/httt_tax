<?php
    class Db{
        private static $instance = NULL;
        public static function getInstance()
        {
            if (!isset(self::$instance)) {
                try {
                    $servername = "module_tax.local";
                    $username = "root";
                    $password = "";
                    $dbname = "btl_tax";
                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    self::$instance = $conn; 
                    //echo "ket noi thanh cong";
                } catch (PDOException $e) {
                    echo "Connection failed: " . $e->getMessage();
                }
            }
            return self::$instance;
        }
    }
?>