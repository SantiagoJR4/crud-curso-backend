<?php

namespace App\Repository;

use App\Entity\Pensum;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;


class busquedaRepository extends ServiceEntityRepository{

    
    public function __construct(ManagerRegistry $registry) {
        parent::__construct($registry, Pensum::class);
    }

    public function busqueda(string $algo){
        $conn = $this->getEntityManager()->getConnection();

        $query='select * from pensum';

        $stmt=$conn->prepare($query);
        $resultSet = $stmt->executeQuery(['algo' => $algo]);

        return $resultSet->fetchAllAssociative();
    }
}