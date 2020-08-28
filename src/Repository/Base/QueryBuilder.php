<?php

namespace App\Repository\Base;

use App\Model\Base\BaseModel;
use PDO;
use PDORow;
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
        if ($this->maxResult !== null ) {
            $query .= " LIMIT " . $this->maxResult;
        }
        return $query;
    }

    private function parseClassName($class): string
    {
        
        $className = str_replace("Repository", "", __CLASS__);
        $className = str_replace(__NAMESPACE__ . "\\", "", $className);
        $className = strtolower($className);
        return $className;
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

    public function getResult()
    {
        //var_dump($this->params);
        //var_dump($this->pdo->prepare("SELECT * FROM project1.user WHERE age=:age")->execute(["age"=>18]));
        $modelName = strtoupper($this->tableName[0]);
        $modelName .= str_replace($this->tableName[0], "", $this->tableName);
        $prepared = $this->getQuery();
        $prepared->execute($this->params);
        //"App\\Model\\" . $modelName . "Model"
        //echo $class."<br>";
        return $prepared
            ->fetchAll(PDO::FETCH_CLASS , "App\Model\\".$modelName . "Model");;
    }
}

/**$test = new QueryBuilder(null);
echo $test->create("u")
->andWhere("u.age = :age")
->andWhere("u.gender = :gender")
->orderBy("u.name", "ASC")
->setMaxResults(5)
->setParameter("age", 18)
->setParameter(":gender", "female")
->getQueryString();**/
