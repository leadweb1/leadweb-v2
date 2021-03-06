<?php

namespace AppBundle\Repository;

/**
 * PageRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PageRepository extends \Doctrine\ORM\EntityRepository
{
    public function findByModule($module)
    {
    	$query = $this->createQueryBuilder('a')
    	->Where('a.module = :arg')
    	->setParameter('arg', 'root.'.$module)
    	->getQuery();
    
    	return $query->getOneOrNullResult();
    }
}
