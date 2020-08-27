<?php
namespace App\Model;

use App\Model\Base\BaseModel;


class UserModel extends BaseModel{
    private $id;
    private $name;
    private $age;

    /**function __construct(int $id, string $name, int $age)
    {
        $this->id = $id;
        $this->name = $name;
        $this->age = $age;
        
    }*/

    public function setId(int $id)
    {
        $this->id = $id;
        return $this;
    }

    public function getId():?int
    {
        return $this->id;
    }
    public function getName():?string 
    {
        return $this->name;
    }

    public function getAge():?int 
    {
        return $this->age;
    }

}