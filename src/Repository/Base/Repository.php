<?php

namespace App\Repository\Base;

interface Repository
{
    public function findBy(array $properties=[]):array;
}
