<?php
namespace App\Model;

use App\Model\Base\BaseModel;

class UserModel extends BaseModel
{
	private $id;
	private $name;
	private $age;

	public function getErrors():array
	{
		$errors =  [];
		return $errors;
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


	public function setId(int $id): self
	{
		$this->id = $id;
		return $this;
	}

	public function setName(string $name): self
	{
		$this->name = $name;
		return $this;
	}

	public function setAge(int $age): self
	{
		$this->age = $age;
		return $this;
	}


	public function getClassVars(): array
	{
		return get_class_vars(get_class($this));
	}

}