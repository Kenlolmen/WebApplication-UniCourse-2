<?php

namespace App\Repository;

use App\Entity\Location;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Location>
 */
class LocationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Location::class);
    }

    public function findByCityAndCountry(string $city, string $country)
    {
        return $this->createQueryBuilder('l')
            ->where('l.city = :city')
            ->andWhere('l.country = :country')
            ->setParameter('city', $city)
            ->setParameter('country', strtoupper($country))
            ->getQuery()
            ->getOneOrNullResult();
    }
    

}
