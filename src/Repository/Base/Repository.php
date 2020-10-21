<?php

namespace App\Repository\Base;

use App\Model\Base\Model;

interface Repository
{
    public function findBy(array $properties=[]):array;
}
