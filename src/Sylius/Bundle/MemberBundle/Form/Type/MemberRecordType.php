<?php
/**
 * Created by PhpStorm.
 * User: Marquis
 * Date: 2017/1/5
 * Time: 下午9:34
 */

namespace Sylius\Bundle\MemberBundle\Form\Type;


use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;

class MemberRecordType extends AbstractResourceType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', ChoiceType::class, [
                'choices' => [
                    '消费' => 'consume', '充值' => 'recharge', '奖励' => 'reward'
                ],
                'label' => 'sylius.form.member.type',
            ])
            ->add('money', null, [
                'label' => 'sylius.form.member.money',
            ])
            ->add('useAddress', ChoiceType::class, [
                'choices' => [
                    '店内' => 'store', '商城' => 'shopping_mall'
                ],
                'label' => 'sylius.form.member.use_address',
            ])
            ->add('MemberExtend', EntityType::class, [
                'label' => 'sylius.form.member.member_extened',
                'class' => 'Sylius\Bundle\MemberBundle\Entity\MemberExtend',
                'multiple' => false
            ])
            ->add('remark', null, [
                'label' => 'sylius.form.member.remark',
            ]);
    }

    public function getBlockPrefix()
    {
        return 'sylius_member_record';
    }

}