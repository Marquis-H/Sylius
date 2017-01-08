<?php
/**
 * Created by PhpStorm.
 * User: Marquis
 * Date: 2017/1/8
 * Time: 上午5:48
 */

namespace Sylius\Bundle\UserBundle\Event;


use \Sylius\Component\Core\Model\Customer;
use Symfony\Component\EventDispatcher\Event;

class RegisterEvent extends Event
{
    /**
     * @var Customer
     */
    private $user;

    /**
     * @var string
     */
    private $inviteCode;

    /**
     * @param Customer $user
     */
    public function __construct(Customer $user, $inviteCode)
    {
        $this->user = $user;
        $this->inviteCode = $inviteCode;
    }

    /**
     * @return Customer
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @return string
     */
    public function getInviteCode()
    {
        return $this->inviteCode;
    }
}