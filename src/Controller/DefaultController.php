<?php

namespace App\Controller;

use App\Entity\Ciel;
use App\Entity\Linka;
use App\Entity\Uep;
use App\Entity\Zaznam;
use App\Form\ZaznamType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerInterface;
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

        for ($i = 14; $i > 0; $i--) {
            $datumy[] = $current->modify('-1 day')->format('d-m-Y');
        }

        /** @var Linka[] $linky */
        $linky        = $em->getRepository(Linka::class)->findAll();
        $uepSelectArr = [];

        foreach ($linky as $linka) {
            $uepSelectArr[] = [
                [
                    $linka->getNazov(),
                    array_map(
                        function (Uep $uep) {
                            return [$uep->getId(), $uep->getNazov()];
                        },
                        $linka->getUeps()->toArray()
                    ),
                ],
            ];
        }

        return $this->render('default/new.html.twig', ['datumy' => $datumy, 'uepSelectData' => $uepSelectArr]);
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
            $zaznam->setZaznamenany(new \DateTime());
            $em->flush();
        }

        return new JsonResponse();
    }

    /**
     * @Route(path="/zaznamy", methods={"GET"}, name="get_zaznam_action")
     */
    public function getZaznamAction(Request $request, EntityManagerInterface $em, SerializerInterface $serializer)
    {
        $den   = $request->get('den', null);
        $uepId = $request->get('uep', null);
        $zmena = $request->get('zmena', null);

        if (!$den || !$uepId || !$zmena) {
            return new JsonResponse([], Response::HTTP_BAD_REQUEST);
        }

        $den = new \DateTime($den);
        $uep = $em->getRepository(Uep::class)->find($uepId);

        /** @var Zaznam $zaznam */
        $zaznam = $em->getRepository(Zaznam::class)->findOneBy(
            [
                'den'   => $den,
                'uep'   => $uep,
                'zmena' => $zmena,
            ]
        );

        if (empty($zaznam)) {
            $zaznam = new Zaznam();
            $zaznam->setDen($den)
                   ->setUep($uep)
                   ->setZmena($zmena);

            /** @var Ciel[] $ciele */
            $ciele = $em->getRepository(Ciel::class)->findBy(['uep' => $uep], ['platnostOd' => 'DESC'], 1);
            if (empty($ciele)) {
                $zaznam->setCielHodinovaVyroba(0)->setCielEfektivita(0)->setCielRo(0);
            } else {
                $ciel = $ciele[0];
                $zaznam->setCielHodinovaVyroba($ciel->getCielHodinovaVyroba())
                       ->setCielEfektivita($ciel->getCielEfektivita())
                       ->setCielRo($ciel->getCielRo());
            }

            $em->persist($zaznam);
            $em->flush();
        }

        $data = $serializer->serialize($zaznam, 'json', SerializationContext::create()->setGroups(['zaznam']));

        return new Response($data, 200, ['Content-Type' => 'application/json']);
    }

    /**
     * @Route(path="/ueps/{uep}/ciel", methods={"GET"}, name="get_ciel_action")
     *
     * @param Uep                    $uep
     * @param EntityManagerInterface $em
     * @param SerializerInterface    $serializer
     *
     * @return Response
     */
    public function getCielAction(Uep $uep, EntityManagerInterface $em, SerializerInterface $serializer)
    {
        try {
            $ciel = $em->createQueryBuilder()->select('c')
                       ->from('App:Ciel', 'c')
                       ->where('c.uep = ?1')
                       ->orderBy('c.platnostOd', 'DESC')
                       ->setMaxResults(1)
                       ->setParameter(1, $uep)
                       ->getQuery()
                       ->getSingleResult();

            $data = $serializer->serialize($ciel, 'json', SerializationContext::create()->setGroups(['zaznam']));

            return new Response($data, 200, ['Content-Type' => 'application/json']);
        } catch (NoResultException $e) {
            return new JsonResponse(['msg' => 'Nenájdený cieľ pre danú linku!'], Response::HTTP_BAD_REQUEST);
        } catch (NonUniqueResultException $e) {
            return new JsonResponse(['msg' => 'Nájdených viacero cieľov pre danú linku!'], Response::HTTP_BAD_REQUEST);
        }
    }
}
