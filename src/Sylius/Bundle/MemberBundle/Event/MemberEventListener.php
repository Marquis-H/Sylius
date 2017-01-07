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
use Util\Str;

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
                //设置编号
                $extend = $em->getRepository('SyliusMemberBundle:MemberExtend')->findOneBy([
                    'MemberCategory' => $newExtend->getMemberCategory()
                ], ['num' => 'desc']);
                if ($extend === null) {
                    $newExtend->setNum(str_pad(1, 6, 0, STR_PAD_LEFT));
                } else {
                    $newExtend->setNum(str_pad(intval($extend->getNum()) + 1, 6, 0, STR_PAD_LEFT));
                }
                //设置邀请码
                $newExtend->setCode(Str::generateUniqidString());
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