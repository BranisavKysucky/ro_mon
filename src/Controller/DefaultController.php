<?php
namespace App\Controller;

use App\Entity\Zaznam;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController ;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request ;
use App\Form\ZaznamType;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route(path="/", name="index_action")
     */
    public function hornatabulka(EntityManagerInterface $em)
    {
//        /** @var Zaznam $zaznam  */
//        $zaznam = $em->getRepository(Zaznam::class)->find(1);

       $current = new \DateTime();
       $datumy = [$current->format('d-m-Y')];
       for ($i = 9; $i > 0; $i--) {
           $datumy[] = $current->modify('-1 day')->format('d-m-Y');
       }



return $this->render('default/new.html.twig', [
//            'zaznam' => $zaznam,
            'datumy' => $datumy,
            ]);
    }

    /**
     * @Route(path="/form", methods={"POST"}, name="form_action")
     */
    public function formAction(Request $request, EntityManagerInterface $em)
    {
        $zaznam = new Zaznam();
        $form = $this->createForm(ZaznamType::class, $zaznam);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($zaznam);
            $em->flush();
        }

//        return new Response('Totot je telo', Response::HTTP_BAD_GATEWAY);

        return $this->redirectToRoute('index_action');
    }

    /**
     * @Route(path="/getData", methods={"POST"}, name="get_data_action")
     */
    public function getDataAction(Request $request, EntityManagerInterface $em)
    {
        $data = $request->request->get('data', null);
        /** @var Zaznam $zaznam */
        $zaznam = $em->getRepository(Zaznam::class)->findOneBy([
            'den' => new \DateTime($data['den']),
            'linka'=> $data['linka'],
            'uep' => $data['uep'],
            'zmena' => $data['zmena']
        ]);

        if (empty($zaznam)) {
            return new JsonResponse([
                'nadcas' => 0,
                'suma_pracovnikov_m' => 0,
                'suma_pracovnikov_o' => 0,
                'pn_lekar_m' => 0,
                'pn_lekar_o' => 0,
                'dovolenka_nv_m' => 0,
                'dovolenka_nv_o' => 0,
                'ine_m' => 0,
                'ine_o' => 0,
                'skolenie_m' => 0,
                'skolenie_o' => 0,
                'pozicany_m' => 0,
                'pozicany_o' => 0,
                'vypozicany_m' => 0,
                'vypozicany_o' => 0,
                'nadcas_2_zmeny_m' => 0,
                'nadcas_2_zmeny_o' => 0,

                'zastavenia_text_f' => 0,
                'zastavenia_int_f' => 0,
                'udrzba_t' => 0,
                'udrzba_i' => 0,
                'logistika_t' => 0,
                'logistika_i' => 0,
                'saturacia_t' => 0,
                'saturacia_i' => 0,
                'nedostatok_t' => 0,
                'nedostatok_i' => 0,
            ]);
        } else {
            //return new JsonResponse($zaznam->toArray());

            $data = [
                'nadcas' => $zaznam->getNadcas(),
                'suma_pracovnikov_m' => $zaznam->getSumaPracovnikovMonitor(),
                'suma_pracovnikov_o' => $zaznam->getSumaPracovnikovOperator(),
                'suma_pracovnikov_m' => $zaznam->getSumaPracovnikovMonitor(),
                'suma_pracovnikov_o' => $zaznam->getSumaPracovnikovOperator(),
                'pn_lekar_m' => $zaznam->getPnLekarMonitor(),
                'pn_lekar_o' => $zaznam->getPnLekarOperator(),
                'dovolenka_nv_m' => $zaznam->getDovolenkaNvMonitor(),
                'dovolenka_nv_o' => $zaznam->getDovolenkaNvOperator(),
                'ine_m' => $zaznam->getIneMonitor(),
                'ine_o' => $zaznam->getIneOperator(),
                'skolenie_m' => $zaznam->getSkolenieMonitor(),
                'skolenie_o' => $zaznam->getSkolenieOperator(),
                'pozicany_m' => $zaznam->getPozicanyMonitor(),
                'pozicany_o' => $zaznam->getPozicanyOperator(),
                'vypozicany_m' => $zaznam->getVypozicanyMonitor(),
                'vypozicany_o' => $zaznam->getVypozicanyOperator(),
                'nadcas_2_zmeny_m' => $zaznam->getNadcas2ZmenyMonitor(),
                'nadcas_2_zmeny_o' => $zaznam->getNadcas2ZmenyOperator(),

                'zastavenia_text_f' => $zaznam->getZastaveniaTextFab(),
                'zastavenia_int_f' => $zaznam->getZastaveniaIntFab(),
                'udrzba_t' => $zaznam->getUdrzbaText(),
                'udrzba_i' => $zaznam->getUdrzbaInt(),
                'logistika_t' => $zaznam->getLogistikaText(),
                'logistika_i' => $zaznam->getLogistikaInt(),
                'saturacia_t' => $zaznam->getSaturaciaText(),
                'saturacia_i' => $zaznam->getSaturaciaInt(),
                'nedostatok_t' => $zaznam->getNedostatokText(),
                'nedostatok_i' => $zaznam->getNedostatokInt(),
            ];
        }

        return new JsonResponse($data);
    }

    /**
     * @Route("/update/{id}", name="update")
     */
    public function update($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $zaznam = $entityManager->getRepository(Zaznam :: class)->find($id);
        if (!$zaznam) {
            throw $this->createNotFoundException(
                'No product found for id ' . $id
            );
        }
        $zaznam->setUep('HC3');
        $entityManager->flush();

        return $this->redirectToRoute('index_action');
        //  return $this -> redirectToRoute ( 'update' , [
        //     'id' => $zaznam -> getId ()
        // ]);

    }



    /**
     * @Route("/show/{id}", name="show")
     */
    public function show ( $id )
    {
        $udrzbatext = $this -> getDoctrine ()

            -> getRepository ( Zaznam :: class )
            ->findAll();
//            -> find ($id );

//        if ( ! $udrzbatext ) {
//            throw $this -> createNotFoundException (
//                'No product found for id ' . $id
//            );
//        }

       // return new Response ( 'UdrzbaText: ' . $udrzbatext -> getUdrzbaText());
        return $this->render('default/new.html.twig', ['Zaznamy' => $udrzbatext]);


        // or render a template
        // in the template, print things with {{ product.name }}
        // return $this->render('product/show.html.twig', ['product' => $product]);
    }





}






