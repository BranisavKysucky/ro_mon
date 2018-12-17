<?php

namespace App\Controller;

use App\Entity\Zaznam;
use Doctrine\ORM\EntityManagerInterface;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApiController extends AbstractController
{
    /**
     * @Route(path="/api/zaznamy", name="get_zaznamy_action")
     *
     * @return Response
     */
    public function getZaznamyAction(EntityManagerInterface $em,  SerializerInterface $serializer)
    {
        /** @var Zaznam[] $zaznamy */
        $zaznamy = $em->getRepository(Zaznam::class)->findAll();

        $data = $serializer->serialize($zaznamy, 'json', SerializationContext::create()->setGroups(['zaznam']));

        return new Response($data, 200, ['Content-Type' => 'application/json']);
    }
}
