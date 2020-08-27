<?php

namespace App\Repository\Base;

use App\Database\PDOFACTORY;
use App\Parser\YamlParser;
use Exception;
use PDO;

class BaseRepository implements Repository
{


    private $queryBuilder;

    public function findBy(array $properties=[]): array
    {
        $alias = explode("\\", get_class($this));
        $alias = strtolower($alias[count($alias)-1][0]);
        $builder = $this->createQueryBuilder($alias);
        foreach ($properties as $key => $value) {
            $builder->andWhere($key. "=:" .$key)
            ->setParameter($key, $value);
        }
        return $builder->getResult();        
    }

    public function createQueryBuilder(string $alias):QueryBuilder
    {
        $tableName = explode("\\", get_class($this));
        $tableName = str_replace("repository", "", strtolower($tableName[count($tableName) - 1]));
        $builder =  new QueryBuilder($this->getPDO(), $tableName);
        return $builder->create($alias);
    }

    private function getPDO():PDO
    {
        //$dbConfig = YamlParser::parseFile("../config/database.yaml");
        $dbConfig = [];
        $dbConfig["HOST"] = "localhost";
        $dbConfig["DB_NAME"] = "project1";
        $dbConfig["USER_NAME"] = "root";
        $dbConfig["PASSWORD"] = "";
        $pdo = new PDOFACTORY($dbConfig["DB_NAME"]);
        return $pdo->getMsqlConnection();
    }

}
