<?php

namespace App\Repository\Base;

use App\Model\Base\Model;

/**
 * @author Alex Nguetcha <nguetchaalex@gmail.com>
 */
interface Repository
{
    public function findBy(array $properties=[]):array;
}
