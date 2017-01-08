<?php

namespace Sylius\Bundle\MemberBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Resource\Model\ResourceInterface;

/**
 * MemberRecord
 *
 * @ORM\Table(name="member_record")
 * @ORM\Entity(repositoryClass="Sylius\Bundle\MemberBundle\Repository\MemberRecordRepository")
 */
class MemberRecord implements ResourceInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $money;

    /**
     * @var string
     */
    private $remark;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var \Sylius\Bundle\MemberBundle\Entity\MemberExtend
     */
    private $MemberExtend;

    /**
     * @var string
     */
    private $useAddress;

    /**
     * Set type
     *
     * @param string $type
     *
     * @return MemberRecord
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set money
     *
     * @param string $money
     *
     * @return MemberRecord
     */
    public function setMoney($money)
    {
        $this->money = $money;

        return $this;
    }

    /**
     * Get money
     *
     * @return string
     */
    public function getMoney()
    {
        return $this->money;
    }

    /**
     * Set remark
     *
     * @param string $remark
     *
     * @return MemberRecord
     */
    public function setRemark($remark)
    {
        $this->remark = $remark;

        return $this;
    }

    /**
     * Get remark
     *
     * @return string
     */
    public function getRemark()
    {
        return $this->remark;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return MemberRecord
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return MemberRecord
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set memberExtend
     *
     * @param \Sylius\Bundle\MemberBundle\Entity\MemberExtend $memberExtend
     *
     * @return MemberRecord
     */
    public function setMemberExtend(\Sylius\Bundle\MemberBundle\Entity\MemberExtend $memberExtend = null)
    {
        $this->MemberExtend = $memberExtend;

        return $this;
    }

    /**
     * Get memberExtend
     *
     * @return \Sylius\Bundle\MemberBundle\Entity\MemberExtend
     */
    public function getMemberExtend()
    {
        return $this->MemberExtend;
    }

    /**
     * Set useAddress
     *
     * @param string $useAddress
     *
     * @return MemberRecord
     */
    public function setUseAddress($useAddress)
    {
        $this->useAddress = $useAddress;

        return $this;
    }

    /**
     * Get useAddress
     *
     * @return string
     */
    public function getUseAddress()
    {
        return $this->useAddress;
    }
}
