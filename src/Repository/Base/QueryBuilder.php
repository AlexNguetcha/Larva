<?php

namespace App\Repository\Base;

use PDO;
use PDOStatement;



class QueryBuilder
{
    private $alias;
    /**
     * Undocumented variable
     *
     * @var PDO
     */
    private $pdo;
    private $tableName;
    private $where = [];
    private $params = [];
    private $queryString = "";
    private $maxResult = null;
    private $orders = [];

    public function __construct(PDO $pdo, string $tableName)
    {
        $this->pdo = $pdo;
        $this->tableName = $tableName;
    }

    public function create(string $alias): QueryBuilder
    {
        $this->alias = $alias;
        return $this;
    }

    public function andWhere($condition): QueryBuilder
    {
        array_push($this->where, $condition);
        return $this;
    }

    public function setParameter($param, $value): QueryBuilder
    {
        $this->params[$param] = $value;
        return $this;
    }

    public function orderBy($field, $value): QueryBuilder
    {
        array_push($this->orders, $field . " " . $value);
        return $this;
    }

    public function setMaxResults(int $maxResult): QueryBuilder
    {
        $this->maxResult = $maxResult;
        return $this;
    }

    public function getQueryString(): string
    {
        if (strlen($this->queryString) !== 0) {
            /**
             * queryString a été parametrer a partir 
             * du setter
             */
            return $this->queryString;
        } else {
            //construction automatique d'une select request
            return $this->createSelectQuery();
        }
    }

    private function createSelectQuery():string
    {
        $query = "SELECT * FROM " . $this->tableName . " AS " . $this->alias;
        //add where clause 
        if (count($this->where) !== 0) {
            $query .= " WHERE ";
            for ($i = 0; $i < count($this->where); $i++) {
                $query .= $this->where[$i];
                if ($i < count($this->where) - 1) {
                    $query .= " AND ";
                }
            }
        }
        //add order by clause 
        for ($i = 0; $i < count($this->orders); $i++) {
            $query .= " ORDER BY " . $this->orders[$i] . " ";
        }
        //add limit clause 
        if ($this->maxResult !== null) {
            $query .= " LIMIT " . $this->maxResult;
        }
        return $query;
    }

    public function setQueryString(string $queryString)
    {
        $this->queryString = $queryString;
        return $this;
    }

    public function setParams(array $params)
    {
        $this->params = $params;
        return $this;
    }

    /**
     * Undocumented function
     *
     * @return PDOStatement
     */
    public function getQuery(): PDOStatement
    {
        return $this->pdo->prepare($this->getQueryString());
    }

    private function getModelName(): string
    {
<<<<<<< HEAD
        //$modelName = strtoupper($this->tableName[0]);
        //$modelName .= str_replace($this->tableName[0], "", $this->tableName);
        $modelName = ucwords($this->tableName);
=======
        $modelName = strtoupper($this->tableName[0]);
        $modelName .= str_replace($this->tableName[0], "", $this->tableName);
>>>>>>> e47bff1c771799cb06b76ded159052e3ff1cd8e0
        return $modelName;
    }

    /**
     * Recupere un tableau d'objet modèle
     *
     * @param string $classSubPath 
     * est necessaire si la classe représentant 
     * le modéle ne se retrouve pas dans la racine
     * du dossier Model
     * @return array
     */
    public function getResult(string $classSubPath=null)
    {
        $prepared = $this->execute();
        $fetchArgs = "App\Model\\";
        if ($classSubPath !== null) {
            $fetchArgs .= $classSubPath."\\";
        }
        $fetchArgs .= $this->getModelName() . "Model";
        return $prepared
            ->fetchAll(PDO::FETCH_CLASS, $fetchArgs);
    }

    public function execute(): PDOStatement
    {   
        $prepared = $this->getQuery();
        $prepared->execute($this->params) or die(print_r($prepared->errorInfo()));
        return $prepared;
    }
}
