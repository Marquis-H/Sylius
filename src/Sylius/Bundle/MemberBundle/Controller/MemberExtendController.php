<?php

namespace Sylius\Bundle\MemberBundle\Controller;

use Sylius\Bundle\MemberBundle\Entity\MemberExtend;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


/**
 * Memberextend controller.
 *
 */
class MemberExtendController extends Controller
{
    /**
     * Lists all memberExtend entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $memberExtends = $em->getRepository('SyliusMemberBundle:MemberExtend')->findAll();

        return $this->render('memberextend/index.html.twig', array(
            'memberExtends' => $memberExtends,
        ));
    }

    /**
     * Finds and displays a memberExtend entity.
     *
     */
    public function showAction(MemberExtend $memberExtend)
    {

        return $this->render('memberextend/show.html.twig', array(
            'memberExtend' => $memberExtend,
        ));
    }
}
