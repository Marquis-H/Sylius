<?php

/**
 * Created by PhpStorm.
 * User: Marquis
 * Date: 2017/1/8
 * Time: 上午12:26
 */
namespace Sylius\Bundle\MemberBundle\Controller\Abstracts;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

abstract class AbstractController extends Controller
{
    /**
     * 创建操作成功JSON响应
     *
     * @param string $message
     * @param array $data
     *
     * @return JsonResponse
     */
    public function createSuccessJSONResponse($message = '', array $data = [])
    {
        return new JsonResponse([
            'code' => 0,
            'message' => $message,
            'data' => $data
        ]);
    }

    /**
     * 创建操作失败JSON响应
     *
     * @param int $code
     * @param string $message
     * @param array $data
     *
     * @return JsonResponse
     */
    public function createFailureJSONResponse($code, $message = '', array $data = [])
    {
        return new JsonResponse([
            'code' => $code,
            'message' => $message,
            'data' => $data
        ]);
    }
}