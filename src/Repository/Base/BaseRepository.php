<?php

namespace App\Repository\Base;

use PDO;
use App\Database\Database;
use App\Model\Base\BaseModel;
use App\Repository\Base\QueryBuilder;


/**
 * @author Alex Nguetcha <nguetchaalex@gmail.com>
 */
class BaseRepository implements Repository
{


    private $queryBuilder;

    public function findBy(array $properties = [], $classSubPath=null): array
    {
        $alias = explode("\\", get_class($this));
        $alias = strtolower($alias[count($alias) - 1][0]);
        $builder = $this->createQueryBuilder($alias);
        foreach ($properties as $key => $value) {
            $builder->andWhere($alias . "." . $key . "=:" . $key)
                ->setParameter($key, $value);
        }
        return $builder->getResult($classSubPath);
    }

    public function createQueryBuilder(string $alias = null): QueryBuilder
    {
        $builder =  new QueryBuilder($this->getPDO(), $this->getTableName());
        return $builder->create($alias);
    }

    protected function getTableName(): string
    {
        $tableName = explode("\\", get_class($this));
        $tableName = str_replace("repository", "", strtolower($tableName[count($tableName) - 1]));
        return $tableName;
    }

    private function getPDO(): PDO
    {
        return Database::getPDO();
    }

    /**
     * Update a model in database
     *
     * @param BaseModel $model
     * @return BaseModel
     */
    public final function insert(BaseModel $model): BaseModel
    {
        $query = "INSERT INTO " . $this->getTableName() . " VALUES(";
        //getting model properties
        $vars = $model->getClassVars();
        $i = 0;
        $params = [];
        foreach ($vars as $key => $value) {
            $query .= ":{$key}";
            if ($i !== count($vars) - 1) {
                $query .= ", ";
            }
            $getter = $key;
            $getter = "get" . strtoupper($getter) . str_replace($getter, "", $key);
            $getter = str_replace("_", "", $getter);
            //call and get getter result
            //for each property
            $getterValue = null;
            if (strtolower($getter) !== "getid") {
                $getterValue =  call_user_func(array($model, $getter));
            }
            $params[$key] = $getterValue;
            $i++;
        }
        $query .= ")";
        $builder = $this->createQueryBuilder("");
        $builder  = $builder->setQueryString($query)
            ->setParams($params)
            ->execute();

        return $model;
    }

    public function update(BaseModel $model)
    {
        $query = "UPDATE ".$this->getTableName()." SET ";
        $vars = $model->getClassVars();
        $i = 0;
        $params = [];
        foreach ($vars as $key => $value) {
            if (strtolower($key) !== "id") {
                $query .= "{$key}=:{$key}";
                if ($i !== count($vars) - 2) {
                    $query .= ", ";
                }
                $getter = $key;
                $getter = "get" . strtolower($getter) . str_replace($getter, "", $key);
                $getter = str_replace("_", "", $getter);
                $getterValue =  call_user_func(array($model, $getter));
                $params[$key] = $getterValue;
                $i++;
            }else{
                $params["id"] =  call_user_func(array($model, "getID"));
            }
        }
        $query .=" WHERE id=:id";;
        
        $builder = $this->createQueryBuilder("");
        $builder  = $builder->setQueryString($query)
            ->setParams($params)
            ->execute();
    }

    public final function delete(BaseModel $model): BaseModel
    {
        $query = "DELETE FROM " . $this->getTableName() . " WHERE id=:id";
        $params = [];
        $params["id"] =  call_user_func(array($model, "getID"));
        $builder = $this->createQueryBuilder("");
        $builder  = $builder->setQueryString($query)
            ->setParams($params)
            ->execute();

        return $model;
    }
}
