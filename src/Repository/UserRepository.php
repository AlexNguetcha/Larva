<?php
namespace App\Repository;

use App\Repository\Base\BaseRepository;

class UserRepository extends BaseRepository{

    public function notAge19():array
    {
        return $this->createQueryBuilder("u")
        ->andWhere("age != :age")
        ->setParameter("age", 19)
        ->setMaxResults(3)
        ->orderBy("name", "ASC")
        ->getResult();
    }

    public function search(string $search):array
    {
        return $this->createQueryBuilder("u")
        ->andWhere("u.name LIKE :search")
        ->setParameter("search", "%".$search."%")
        ->getResult();
    }



    
}