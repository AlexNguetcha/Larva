<?php
namespace App\Database;

use PDO;
use Exception;
    /**
     * 
     */
    class PDOFACTORY
    {
        private $db_name;
        private $db_username;
        private $host_name;
        private $db_password;

    	function __construct($db_name,$db_username="root",$host_name="localhost",$db_password="")
    	{
    	    $this->db_name = $db_name;
    	    $this->db_username = $db_username;
    	    $this->host_name = $host_name;
            $this->db_password = $db_password;
    	}

    	public function getMsqlConnection(){
    	    try{
                $db = new PDO("mysql:dbname=".$this->db_name.";charset=utf8;host=".$this->host_name,$this->db_username,$this->db_password);
                $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                return  $db;
            }catch (Exception $e){
    	        print_r("Erreur : ".$e->getMessage());
            }

        }

        public static function createDatase($db_name, $db_username="root",$host_name="localhost",$db_password=""){
            try{
                $db = new PDO("mysql:host=".$host_name,$db_username,$db_password);
                $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                $db->exec("CREATE DATABASE IF NOT EXISTS ".$db_name);
                return true;
            }catch (Exception $e){
    	        print_r("Erreur : ".$e->getMessage());
            }
            return false;
        }


        public function createTable(array $tables){
            for ($i=0; $i <count($tables) ; $i++) {
                $this->getMsqlConnection()->exec($tables[$i]);
            }
            return true;
        }
        

    }

