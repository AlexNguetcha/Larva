<?php 
namespace App\Kernel;

use App\Database\Database;

class Kernel{

    public function getPath():string 
    {
        $path = "/";
        if (isset($_SERVER["PATH_INFO"])) {
            $path = $_SERVER["PATH_INFO"];
        }
        return $path;
    }

    public function createTables(array $tables = [])
    {
        $db = Database::getPDOFactory();
        $db->createTable($tables);
    }
}