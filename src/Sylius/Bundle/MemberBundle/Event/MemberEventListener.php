<?php

/**
 * Created by PhpStorm.
 * User: Marquis
 * Date: 2017/1/6
 * Time: 上午12:01
 */
namespace Sylius\Bundle\MemberBundle\Event;

use Doctrine\Common\EventSubscriber;
use \Doctrine\ORM\Event\LifecycleEventArgs;
use Sylius\Bundle\MemberBundle\Entity\MemberExtend;
use Sylius\Bundle\MemberBundle\Entity\MemberRecord;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

class MemberEventListener implements EventSubscriber
{
    use ContainerAwareTrait;

    public function getSubscribedEvents()
    {
        return array(
            'postPersist'
        );
    }

    public function postPersist(LifecycleEventArgs $event)
    {
        $em = $this->container->get('doctrine.orm.entity_manager');
        $entity = $event->getEntity();
        if ($entity instanceof MemberExtend && $entity->getMultipleCustomer() !== null) {
            foreach ($entity->getMultipleCustomer() as $value) {
                $newExtend = clone $entity;
                $newExtend->setCustomer($value);
                $newExtend->setMultipleCustomer(null);
                $em->persist($newExtend);
                $em->flush();
            }
            $em->remove($entity);
        }
        if ($entity instanceof MemberRecord) {
            $memberExtend = $entity->getMemberExtend();
            $money = $memberExtend->getMoney() + $entity->getMoney();
            $memberExtend->setMoney($money);
            $em->persist($entity);
            $em->flush();
        }
    }
}