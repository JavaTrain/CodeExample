<?php
namespace Test\UserBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Test\UserBundle\Entity\User;

class UserRepository extends EntityRepository
{
    public function findByCourseRoleGroupId($course = null, $role = null, $group = null, $id = null)
    {

        $em = $this->getEntityManager();
        $qb = $em->createQueryBuilder();
        $qb   ->select('u', 'c', 'g')
                    ->from('TestUserBundle:User', 'u')
                    ->leftJoin('u.courses', 'c')
                    ->leftJoin('u.groups', 'g');
            if(!empty($course)) {
                $qb->andWhere('c.name = :name')
                ->setParameter('name', $course);
            }

            if(!empty($role)) {
                $qb->andWhere('u.role = :role')
                ->setParameter('role', $role);
            }

            if(!empty($group)) {
                $qb->andWhere('g.id = :group')
                    ->setParameter('group', $group);
            }
            if(!empty($id)) {
                $qb->andWhere('u.id = :id')
                    ->setParameter('id', $id);
            }


        return $qb->getQuery()->getResult();
//        exit(\Doctrine\Common\Util\Debug::dump($qb->getQuery()->getResult()));

    }



}