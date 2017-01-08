<?php
/**
 * Created by PhpStorm.
 * User: Marquis
 * Date: 2017/1/5
 * Time: 下午9:31
 */

namespace Sylius\Bundle\MemberBundle\Form\Type;


use Sylius\Bundle\MemberBundle\Entity\MemberExtend;
use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Validator\Constraints\NotBlank;

class MemberExtendType extends AbstractResourceType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $id = $builder->getData()->getId();
        $builder
            ->add('isEnable', CheckboxType::class, [
                'label' => 'sylius.form.member.enabled',
            ])
            ->add('money', null, [
                'label' => 'sylius.form.member.money',
            ])
            ->add('MemberCategory', EntityType::class, [
                'label' => 'sylius.form.member.member_category',
                'class' => 'Sylius\Bundle\MemberBundle\Entity\MemberCategory',
            ])
            ->add('grade', null, [
                'label' => 'sylius.form.member.customer',
                'disabled' => true
            ]);
        if ($id) {
            $builder
                ->add('Customer', EntityType::class, [
                    'label' => 'sylius.form.member.customer',
                    'class' => 'Sylius\Component\Customer\Model\Customer',
                    'multiple' => false,
                    'disabled' => true
                ]);
        } else {
            $builder
                ->add('multipleCustomer', EntityType::class, [
                    'label' => 'sylius.form.member.customer',
                    'class' => 'Sylius\Component\Customer\Model\Customer',
                    'constraints' => [
                        new NotBlank(['groups' => ['member']]),
                    ],
                    'multiple' => true
                ]);
        }
        $builder
            ->add('remark', null, [
                'label' => 'sylius.form.member.remark',
            ]);
    }

    public function getBlockPrefix()
    {
        return 'sylius_member_extend';
    }

}