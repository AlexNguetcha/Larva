<?php

namespace App\Repository\Base;

use PDO;
use Exception;
use App\Components\Json;
use App\Model\Base\Model;
use App\Parser\YamlParser;
use App\Database\PDOFACTORY;
use App\Model\Base\BaseModel;
use App\Repository\Base\QueryBuilder;

class BaseRepository implements Repository
{


    private $queryBuilder;

    public function findBy(array $properties=[]): array
    {
        $alias = explode("\\", get_class($this));
        $alias = strtolower($alias[count($alias)-1][0]);
        $builder = $this->createQueryBuilder($alias);
        foreach ($properties as $key => $value) {
            $builder->andWhere($alias.".".$key. "=:" .$key)
            ->setParameter($key, $value);
        }
        return $builder->getResult();        
    }

    public function createQueryBuilder(string $alias = null):QueryBuilder
    {
        $builder =  new QueryBuilder($this->getPDO(), $this->getTableName());
        return $builder->create($alias);
    }

    protected function getTableName():string
    {
        $tableName = explode("\\", get_class($this));
        $tableName = str_replace("repository", "", strtolower($tableName[count($tableName) - 1]));
        return $tableName;
    }

    private function getPDO():PDO
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

    /**
     * Met à jour un Model en base de donée
     *
     * @param BaseModel $model
     * @return BaseModel
     */
    public final function insert(BaseModel $model):BaseModel
    {
        $query = "INSERT INTO ".$this->getTableName()." VALUES(";
        //recuperation des proprietes du model
        $vars = $model->getClassVars();
        $i = 0;
        $params = [];
        foreach ($vars as $key => $value) {
            $query .= ":{$key}";
            if ($i !== count($vars) - 1) {
                $query .= ", ";
            }
            $getter = $key[0];
            $getter = "get".strtoupper($getter).str_replace($getter, "", $key);
            //appel du getter et recuperation
            //de la valeur de chaque proprietes
            $getterValue =  call_user_func(array($model, $getter));
            $params[$key] = $getterValue;
            $i++;
        }
        $query .= ")";
        $builder = $this->createQueryBuilder("");
        $builder  = $builder->setQueryString($query)
        ->setParams($params)
        ->execute();
;
        //echo $builder->getQueryString();
        //print_r($params);
        return $model;
    }

}
