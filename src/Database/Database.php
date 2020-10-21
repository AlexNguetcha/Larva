<?php 
namespace App\Database;

use PDO;
use App\Components\Json;
use App\Database\PDOFACTORY;

class Database
{
    static function getPDO(): PDO
    {
        return self::getPDOFactory()->getMsqlConnection();
    }

    static function getPDOFactory(): PDOFACTORY
    {
        $json = Json::getInstance();
        $dbConfig = $json->decode(file_get_contents("../config/database.json")); 
        return new PDOFACTORY(
            $dbConfig["dbname"],
            $dbConfig["username"],
            $dbConfig["hostname"],
            $dbConfig["password"]
        );
    }
}