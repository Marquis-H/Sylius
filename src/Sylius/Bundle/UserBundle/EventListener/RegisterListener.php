<?php
/**
 * Created by PhpStorm.
 * User: Marquis
 * Date: 2017/1/8
 * Time: 下午12:26
 */

namespace Sylius\Bundle\UserBundle\EventListener;

use Sylius\Bundle\MemberBundle\Constants\MemberRecordConstant;
use Sylius\Bundle\MemberBundle\Entity\MemberExtend;
use Sylius\Bundle\MemberBundle\Entity\MemberRecord;
use Sylius\Bundle\UserBundle\Event\RegisterEvent;
use Sylius\Bundle\UserBundle\UserEvents;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Util\Str;

/**
 * Class RegisterListener
 * @package Sylius\Bundle\UserBundle\EventListener
 */
class RegisterListener implements EventSubscriberInterface
{
    use ContainerAwareTrait;

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            UserEvents::INVITE_REGISTER => 'onInviteRegister'
        ];
    }

    /**
     * @param RegisterEvent $event
     */
    public function onInviteRegister(RegisterEvent $event)
    {
        $user = $event->getUser();
        $inviteCode = $event->getInviteCode();
        $em = $this->container->get('doctrine.orm.entity_manager');

        $member = $em->getRepository('SyliusMemberBundle:MemberExtend')->findOneBy([
            'code' => $inviteCode
        ]);
        if ($member === null)
            //TODO 无效的邀请码
            return;
        $inviteCustomer = $member->getCustomer();

        //创建会员卡
        $memberExtend = new MemberExtend();
        $memberExtend->setMemberCategory($member->getMemberCategory());
        $memberExtend->setCustomer($user);
        $memberExtend->setMoney(0);
        $memberExtend->setIsEnable(true);
        //设置编号
        $extend = $em->getRepository('SyliusMemberBundle:MemberExtend')->findOneBy([
            'MemberCategory' => $memberExtend->getMemberCategory()
        ], ['num' => 'desc']);
        if ($extend === null) {
            $memberExtend->setNum(str_pad(1, 6, 0, STR_PAD_LEFT));
        } else {
            $memberExtend->setNum(str_pad(intval($extend->getNum()) + 1, 6, 0, STR_PAD_LEFT));
        }
        //推荐人获得推荐积分
        $this->inviteMoney($member);
        //设置邀请码
        $memberExtend->setCode(Str::generateUniqidString());
        $memberExtend->setInvitedCustomer($inviteCustomer);
        $em->persist($memberExtend);
        $em->flush();
    }

    /**
     * 推荐人获得推荐积分
     *
     * @param MemberExtend $member
     */
    private function inviteMoney(MemberExtend $member)
    {
        $memberCategory = $member->getMemberCategory();
        $em = $this->container->get('doctrine.orm.entity_manager');
        //使用记录
        $memberRecord = new MemberRecord();
        $memberRecord->setMoney($memberCategory->getInvitePoint());
        $memberRecord->setMemberExtend($member);
        $memberRecord->setType(MemberRecordConstant::MEMBER_RECORD_TYPE_REWARD);
        $memberRecord->setRemark('推荐奖励');
        //更新积分
        $money = (float)$member->getMoney() + (float)$memberCategory->getInvitePoint();
        $member->setMoney($money);
        $em->persist($memberRecord);
        $em->persist($member);
        $em->flush();
    }
}