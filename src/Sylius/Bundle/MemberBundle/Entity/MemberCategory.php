<?php

namespace Sylius\Bundle\MemberBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Resource\Model\ResourceInterface;

/**
 * MemberCategory
 *
 * @ORM\Table(name="member_category")
 * @ORM\Entity(repositoryClass="Sylius\Bundle\MemberBundle\Repository\MemberCategoryRepository")
 */
class MemberCategory implements ResourceInterface
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
    private $name;

    /**
     * @var boolean
     */
    private $isEnable;

    /**
     * @var string
     */
    private $category;

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
     * @var array
     */
    private $gradeType;

    /**
     * @var string
     */
    private $invitePoint;

    /**
     * @return string
     */
    function __toString()
    {
        return (string)$this->name;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return MemberCategory
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set isEnable
     *
     * @param boolean $isEnable
     *
     * @return MemberCategory
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
     * Set category
     *
     * @param string $category
     *
     * @return MemberCategory
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set remark
     *
     * @param string $remark
     *
     * @return MemberCategory
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
     * @return MemberCategory
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
     * @return MemberCategory
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
     * Set gradeType
     *
     * @param array $gradeType
     *
     * @return MemberCategory
     */
    public function setGradeType($gradeType)
    {
        $this->gradeType = $gradeType;

        return $this;
    }

    /**
     * Get gradeType
     *
     * @return array
     */
    public function getGradeType()
    {
        return $this->gradeType;
    }

    /**
     * Set invitePoint
     *
     * @param string $invitePoint
     *
     * @return MemberCategory
     */
    public function setInvitePoint($invitePoint)
    {
        $this->invitePoint = $invitePoint;

        return $this;
    }

    /**
     * Get invitePoint
     *
     * @return string
     */
    public function getInvitePoint()
    {
        return $this->invitePoint;
    }
}
