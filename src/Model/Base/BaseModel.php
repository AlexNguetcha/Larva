<?php

namespace App\Model\Base;

use App\Repository\Base\QueryBuilder;

abstract class BaseModel implements Model
{
    abstract function getClassVars():array;
    
    public function isValid():bool{
        return true;
    }

    public function getErrors():array
    {
        return [];
    }
}
