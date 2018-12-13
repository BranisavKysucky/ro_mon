<?php
/**
 * Created by PhpStorm.
 * User: U555746
 * Date: 12/13/2018
 * Time: 12:47 PM
 */

namespace App\Controller;


use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ApiController extends AbstractController
{
    /**
     * @Route(path="/api", name="api_action")
     *
     * @param EntityManagerInterface $em
     *
     * @return JsonResponse
     */
    public function apiAction(EntityManagerInterface $em)
    {
        return new JsonResponse(['ok' => true]);
    }
}