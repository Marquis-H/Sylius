<?php

namespace Sylius\Bundle\MemberBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Resource\Model\ResourceInterface;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * MemberExtend
 *
 * @ORM\Table(name="member_extend")
 * @ORM\Entity(repositoryClass="Sylius\Bundle\MemberBundle\Repository\MemberExtendRepository")
 */
class MemberExtend implements ResourceInterface
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
    private $money = 0;

    /**
     * @var boolean
     */
    private $isEnable = false;

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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $MemberRecord;

    /**
     * @var \Sylius\Bundle\MemberBundle\Entity\MemberCategory
     */
    private $MemberCategory;

    /**
     * @var \Sylius\Component\Customer\Model\Customer
     */
    private $customer;

    /**
     * @var string
     */
    private $num;

    /**
     * @var string
     */
    private $code;

    /**
     * @var \Sylius\Component\Customer\Model\Customer
     */
    private $invitedCustomer;

    /**
     * @var ArrayCollection
     */
    private $multipleCustomer;

    /**
     * @var string
     */
    private $grade = 0;

    /**
     * @return ArrayCollection
     */
    public function getMultipleCustomer()
    {
        return $this->multipleCustomer;
    }

    /**
     * @param ArrayCollection $multipleCustomer
     */
    public function setMultipleCustomer($multipleCustomer)
    {
        $this->multipleCustomer = $multipleCustomer;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->MemberRecord = new ArrayCollection();
    }

    /**
     * @return string
     */
    function __toString()
    {
        return (string)$this->getMemberCategory()->getName() . ' (' . $this->getCustomer()->getEmail() . ')';
    }

    /**
     * Set money
     *
     * @param string $money
     *
     * @return MemberExtend
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
     * Set isEnable
     *
     * @param boolean $isEnable
     *
     * @return MemberExtend
     */
    public function setIsEnable($isEnable)
    {
        $this->isEnable = $isEnable;

        return $this;
    }

    /**
     * Get isEnable
     *
     * @return boolean
     */
    public function getIsEnable()
    {
        return $this->isEnable;
    }

    /**
     * Set remark
     *
     * @param string $remark
     *
     * @return MemberExtend
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
     * @return MemberExtend
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
     * @return MemberExtend
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
     * Add memberRecord
     *
     * @param \Sylius\Bundle\MemberBundle\Entity\MemberRecord $memberRecord
     *
     * @return MemberExtend
     */
    public function addMemberRecord(\Sylius\Bundle\MemberBundle\Entity\MemberRecord $memberRecord)
    {
        $this->MemberRecord[] = $memberRecord;

        return $this;
    }

    /**
     * Remove memberRecord
     *
     * @param \Sylius\Bundle\MemberBundle\Entity\MemberRecord $memberRecord
     */
    public function removeMemberRecord(\Sylius\Bundle\MemberBundle\Entity\MemberRecord $memberRecord)
    {
        $this->MemberRecord->removeElement($memberRecord);
    }

    /**
     * Get memberRecord
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMemberRecord()
    {
        return $this->MemberRecord;
    }

    /**
     * Set memberCategory
     *
     * @param \Sylius\Bundle\MemberBundle\Entity\MemberCategory $memberCategory
     *
     * @return MemberExtend
     */
    public function setMemberCategory(\Sylius\Bundle\MemberBundle\Entity\MemberCategory $memberCategory = null)
    {
        $this->MemberCategory = $memberCategory;

        return $this;
    }

    /**
     * Get memberCategory
     *
     * @return \Sylius\Bundle\MemberBundle\Entity\MemberCategory
     */
    public function getMemberCategory()
    {
        return $this->MemberCategory;
    }

    /**
     * Set customer
     *
     * @param \Sylius\Component\Customer\Model\Customer $customer
     *
     * @return MemberExtend
     */
    public function setCustomer(\Sylius\Component\Customer\Model\Customer $customer = null)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Get customer
     *
     * @return \Sylius\Component\Customer\Model\Customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Set num
     *
     * @param string $num
     *
     * @return MemberExtend
     */
    public function setNum($num)
    {
        $this->num = $num;

        return $this;
    }

    /**
     * Get num
     *
     * @return string
     */
    public function getNum()
    {
        return $this->num;
    }

    /**
     * Set code
     *
     * @param string $code
     *
     * @return MemberExtend
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set invitedCustomer
     *
     * @param \Sylius\Component\Customer\Model\Customer $invitedCustomer
     *
     * @return MemberExtend
     */
    public function setInvitedCustomer(\Sylius\Component\Customer\Model\Customer $invitedCustomer = null)
    {
        $this->invitedCustomer = $invitedCustomer;

        return $this;
    }

    /**
     * Get invitedCustomer
     *
     * @return \Sylius\Component\Customer\Model\Customer
     */
    public function getInvitedCustomer()
    {
        return $this->invitedCustomer;
    }

    /**
     * Set grade
     *
     * @param string $grade
     *
     * @return MemberExtend
     */
    public function setGrade($grade)
    {
        $this->grade = $grade;

        return $this;
    }

    /**
     * Get grade
     *
     * @return string
     */
    public function getGrade()
    {
        return $this->grade;
    }
}
