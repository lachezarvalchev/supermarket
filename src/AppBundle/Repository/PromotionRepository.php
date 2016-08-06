<?php

namespace AppBundle\Repository;


use AppBundle\Entity\Promotion;
use Doctrine\ORM\EntityRepository;

class PromotionRepository extends EntityRepository {

  /**
   * @return Promotion[]
   */
  public function findOrderByCode() {
    return $this->createQueryBuilder('promotion')
                ->orderBy('promotion.code', 'ASC')
                ->getQuery()
                ->execute();
  }

}
