<?php

namespace AppBundle\Repository;


use AppBundle\Entity\Product;
use Doctrine\ORM\EntityRepository;

class ProductRepository extends EntityRepository {

     /**
     * @return Product[]
     */
     public function findOrderBySKU() {
       return $this->createQueryBuilder('product')
         ->orderBy('product.sku', 'ASC')
         ->getQuery()
         ->execute();
     }

}
