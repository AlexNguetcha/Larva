<?php
namespace App\Model;

use App\Model\Base\BaseModel;


class UserModel extends BaseModel{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $name;
    /**
     * @var int
     */
    private $age;

    public function getClassVars(): array
    {
        return get_class_vars(get_class($this));
    }

    /**function __construct(int $id, string $name, int $age)
    {
        $this->id = $id;
        $this->name = $name;
        $this->age = $age;
        
    }*/

    public function setId(?int $id)
    {
        $this->id = $id;
        return $this;
    }

    public function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }

    public function setAge(int $age)
    {
        $this->age = $age;
        return $this;
    }

    public function getId(): int
    {
        return $this->id;
    }
    public function getName(): string 
    {
        return $this->name;
    }

    public function getAge(): int 
    {
        return $this->age;
    }

}