<?php

/**
 * Created by PhpStorm.
 * User: Marquis
 * Date: 2017/1/7
 * Time: 下午12:24
 */
namespace Sylius\Bundle\PayumBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Payum\Core\PayumBuilder;
use Payum\Core\Request\Capture;
use Payum\Core\Request\GetHumanStatus;
use Payum\Core\Model\ArrayObject;

/**
 * Class OmnipayCommand
 * @package Sylius\Bundle\PayumBundle\Command
 */
class OmnipayCommand extends ContainerAwareCommand
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('payum:omnipay');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $payum = (new PayumBuilder())
            ->addDefaultStorages()
            ->addGateway('stripe', ['factory' => 'omnipay_stripe', 'apiKey' => 'abc123'])
            ->getPayum()
        ;

        $card = ['number' => '4242424242424242', 'expiryMonth' => '6', 'expiryYear' => '2016', 'cvv' => '123'];
        $payment = new ArrayObject(['amount' => '10.00', 'currency' => 'USD', 'card' => $card]);

        if ($reply = $payum->getGateway('stripe')->execute(new Capture($payment), true)) {
            var_dump($reply);
        }

        $payum->getGateway('stripe')->execute($status = new GetHumanStatus($payment));
        if ($status->isCaptured()) {
            var_dump($status);
        }
    }

}