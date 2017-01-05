<?php

namespace Sylius\Bundle\MemberBundle\Controller;

use Sylius\Bundle\MemberBundle\Entity\MemberCategory;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


/**
 * Membercategory controller.
 *
 */
class MemberCategoryController extends Controller
{
    /**
     * Lists all memberCategory entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $memberCategories = $em->getRepository('SyliusMemberBundle:MemberCategory')->findAll();

        return $this->render('membercategory/index.html.twig', array(
            'memberCategories' => $memberCategories,
        ));
    }

    /**
     * Finds and displays a memberCategory entity.
     *
     */
    public function showAction(MemberCategory $memberCategory)
    {

        return $this->render('membercategory/show.html.twig', array(
            'memberCategory' => $memberCategory,
        ));
    }
}
