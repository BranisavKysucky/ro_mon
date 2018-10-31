<?php

namespace App\Controller;

use App\Entity\Zaznam;
use App\Form\ZaznamType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route(path="/", name="index_action")
     *
     * @param EntityManagerInterface $em
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function hornatabulka(EntityManagerInterface $em)
    {
        $current = new \DateTime();
        $datumy  = [$current->format('d-m-Y')];

        for ($i = 9; $i > 0; $i--) {
            $datumy[] = $current->modify('-1 day')->format('d-m-Y');
        }


        return $this->render('default/new.html.twig', ['datumy' => $datumy]);
    }

    /**
     * @Route(path="/zaznamy/{zaznam}", methods={"POST"}, name="update_zaznam_action")
     *
     * @param Request                $request
     * @param Zaznam                 $zaznam
     * @param EntityManagerInterface $em
     *
     * @return JsonResponse
     */
    public function updateZaznamAction(Request $request, Zaznam $zaznam, EntityManagerInterface $em)
    {
        $form = $this->createForm(ZaznamType::class, $zaznam);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();
        }

        return new JsonResponse();
    }

    /**
     * @Route(path="/zaznamy", methods={"GET"}, name="get_zaznam_action")
     */
    public function getZaznamAction(Request $request, EntityManagerInterface $em)
    {
        $den   = $request->get('den', null);
        $linka = $request->get('linka', null);
        $uep   = $request->get('uep', null);
        $zmena = $request->get('zmena', null);

        if (!$den || !$linka || !$uep || !$zmena ) {
            return new JsonResponse([], Response::HTTP_BAD_REQUEST);
        }

        $den = new \DateTime($den);

        /** @var Zaznam $zaznam */
        $zaznam = $em->getRepository(Zaznam::class)->findOneBy(
            [
                'den'   => $den,
                'linka' => $linka,
                'uep'   => $uep,
                'zmena' => $zmena
            ]
        );

        if (empty($zaznam)) {
            $zaznam = new Zaznam();
            $zaznam->setDen($den);
            $zaznam->setLinka($linka);
            $zaznam->setUep($uep);
            $zaznam->setZmena($zmena);

            $em->persist($zaznam);
            $em->flush();
        }

        return new JsonResponse(['zaznamId' => $zaznam->getId(), 'zaznamData' => $zaznam->toArray()]);
    }
}
