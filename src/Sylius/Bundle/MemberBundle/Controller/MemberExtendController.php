<?php

namespace Sylius\Bundle\MemberBundle\Controller;

use Sylius\Bundle\MemberBundle\Controller\Abstracts\AbstractController;
use Sylius\Bundle\MemberBundle\Entity\MemberExtend;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


/**
 * Memberextend controller.
 *
 */
class MemberExtendController extends AbstractController
{
    /**
     * 启用会员卡
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function enableMemberCardAction(Request $request)
    {
        $em = $this->get('doctrine.orm.entity_manager');
        $post = $request->request;
        $id = $post->get('id');

        $memberExtend = $em->getRepository('SyliusMemberBundle:MemberExtend')->findOneBy([
            'id' => $id
        ]);

        if ($memberExtend === null)
            return $this->createFailureJSONResponse(1, 'error');

        $memberExtend->setIsEnable(true);
        $em->persist($memberExtend);
        $em->flush();

        return $this->createSuccessJSONResponse('success');
    }
}
