<?php

/**
 * Created by PhpStorm.
 * User: Marquis
 * Date: 2017/1/5
 * Time: 下午12:16
 */
namespace Sylius\Bundle\MemberBundle\Form\Type;

use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Sylius\Component\Addressing\Model\Province;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class MemberCategoryType
 * @package Sylius\Bundle\MemberBundle\Form\Type
 */
class MemberCategoryType extends AbstractResourceType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, [
                'label' => 'sylius.form.member.name',
            ])
            ->add('isEnable', CheckboxType::class, [
                'label' => 'sylius.form.member.enabled',
            ])
            ->add('gradeType', CollectionType::class, [
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                'button_add_label' => 'sylius.form.member.add_grade',
                'label' => 'sylius.form.member.grade_type'
            ])
            ->add('invitePoint', null, [
                'label' => 'sylius.form.member.invite_point',
            ])
            ->add('category', null, [
                'label' => 'sylius.form.member.category',
            ])
            ->add('remark', null, [
                'label' => 'sylius.form.member.remark',
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'sylius_member_category';
    }


}