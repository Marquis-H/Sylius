<?php

/**
 * Created by PhpStorm.
 * User: Marquis
 * Date: 2017/1/8
 * Time: 下午7:23
 */
namespace Sylius\Bundle\MemberBundle\Constants;

abstract class MemberRecordConstant
{
    /**
     * 消费
     */
    const MEMBER_RECORD_TYPE_CONSUME = 'consume';

    /**
     * 充值
     */
    const MEMBER_RECORD_TYPE_RECHARGE = 'recharge';

    /**
     * 奖励
     */
    const MEMBER_RECORD_TYPE_REWARD = 'reward';

    /**
     * 店内
     */
    const MEMBER_RECORD_TYPE_ADDRESS_STORE = 'store';

    /**
     * 商城
     */
    const MEMBER_RECORD_TYPE_ADDRESS_SHOPPING_MALL = 'shopping_mall';
}