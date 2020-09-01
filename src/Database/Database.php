<?php 
namespace App\Database;

use PDO;
use App\Components\Json;

class Database
{
    static function getPDO(): PDO
    {
        $json = Json::getInstance();

        $dbConfig = $json->decode(file_get_contents("../config/database.json"));
        $pdo = new PDOFACTORY(
            $dbConfig["dbname"],
            $dbConfig["username"],
            $dbConfig["hostname"],
            $dbConfig["password"]
        );
        return $pdo->getMsqlConnection();
    }
}