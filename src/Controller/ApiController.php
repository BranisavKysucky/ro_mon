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
     * @Route(path="/api", methods={"GET"}, name="api_action")
     *
     * @param EntityManagerInterface $em
     *
     * @return JsonResponse
     */
    public function apiAction(EntityManagerInterface $em)
    {

        /** @var Zaznam[] $zaznamy */
        $zaznamy = $this->getDoctrine()->getRepository('App:Zaznam')->findAll();
        $uep = $this->getDoctrine()->getRepository('App:Uep')->findAll();
        $zaznamyArr = [];
        foreach ($zaznamy as $zaznam) {
        $zaznamyArr[] = $zaznam->toArray();
    }

        return new JsonResponse($zaznamyArr);



//        return new JsonResponse(['ok' => true]);
    }
}