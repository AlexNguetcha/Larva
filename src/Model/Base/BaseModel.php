<?php

namespace App\Model\Base;

use App\Repository\Base\QueryBuilder;

/**
 * @author Alex Nguetcha <nguetchaalex@gmail.com>
 */
abstract class BaseModel implements Model
{
    abstract function getClassVars():array;
    
    public final function isValid():bool{
        return count($this->getErrors()) == 0;
    }

    public function getErrors():array
    {
        return [];
    }
}
