<?php

namespace Sylius\Bundle\MemberBundle\Controller;

use Sylius\Bundle\MemberBundle\Entity\MemberRecord;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


/**
 * Memberrecord controller.
 *
 */
class MemberRecordController extends Controller
{
    /**
     * Lists all memberRecord entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $memberRecords = $em->getRepository('SyliusMemberBundle:MemberRecord')->findAll();

        return $this->render('memberrecord/index.html.twig', array(
            'memberRecords' => $memberRecords,
        ));
    }

    /**
     * Finds and displays a memberRecord entity.
     *
     */
    public function showAction(MemberRecord $memberRecord)
    {

        return $this->render('memberrecord/show.html.twig', array(
            'memberRecord' => $memberRecord,
        ));
    }
}
