<?php
namespace App\Controller;

use App\Entity\Zaznam;
use Doctrine\ORM\EntityManagerInterface;
//use http\Env\Response;
use phpDocumentor\Reflection\Types\Integer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController ;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request ;
use App\Form\ZaznamType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response ;

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
     * @Route(path="/form/{zaznam}", methods={"POST"}, name="form_action")
     */
    public function formAction(Zaznam $zaznam, Request $request, EntityManagerInterface $em)
    {
        $zaznamData = new Zaznam();
        $form = $this->createForm(ZaznamType::class, $zaznamData);
        $form->handleRequest($request);

        // toto je len podmienka na overenie ci sa to tam nachadza

        if ($form->isSubmitted() && $form->isValid()) {
            $zaznam->setNadcas($zaznamData->getNadcas());
            $zaznam->setSumaPracovnikovMonitor($zaznamData->getSumaPracovnikovMonitor());
            $zaznam->setSumaPracovnikovOperator($zaznamData->getSumaPracovnikovOperator());
            $zaznam->setPnLekarMonitor($zaznamData->getPnLekarMonitor());
            $zaznam->setPnLekarOperator($zaznamData->getPnLekarOperator());
            $zaznam->setDovolenkaNvMonitor($zaznamData->getDovolenkaNvMonitor());
            $zaznam->setDovolenkaNvOperator($zaznamData->getDovolenkaNvOperator());
            $zaznam->setIneMonitor($zaznamData->getIneMonitor());
            $zaznam->setIneOperator($zaznamData->getIneOperator());
            $zaznam->setSkolenieMonitor($zaznamData->getSkolenieMonitor());
            $zaznam->setSkolenieOperator($zaznamData->getSkolenieOperator());
            $zaznam->setPozicanyMonitor($zaznamData->getPozicanyMonitor());
            $zaznam->setPozicanyOperator($zaznamData->getPozicanyOperator());
            $zaznam->setVypozicanyMonitor($zaznamData->getVypozicanyMonitor());
            $zaznam->setVypozicanyOperator($zaznamData->getVypozicanyOperator());
            $zaznam->setNadcas2ZmenyMonitor($zaznamData->getNadcas2ZmenyMonitor());
            $zaznam->setNadcas2ZmenyOperator($zaznamData->getNadcas2ZmenyOperator());
            $zaznam->setZastaveniaIntFab($zaznamData->getZastaveniaIntFab());
            $zaznam->setZastaveniaTextFab($zaznamData->getZastaveniaTextFab());
            $zaznam->setUdrzbaInt($zaznamData->getUdrzbaInt());
            $zaznam->setUdrzbaText($zaznamData->getUdrzbaText());
            $zaznam->setLogistikaInt($zaznamData->getLogistikaInt());
            $zaznam->setLogistikaText($zaznamData->getLogistikaText());
            $zaznam->setSaturaciaInt($zaznamData->getSaturaciaInt());
            $zaznam->setSaturaciaText($zaznamData->getSaturaciaText());
            $zaznam->setNedostatokInt($zaznamData->getNedostatokInt());
            $zaznam->setNedostatokText($zaznamData->getNedostatokText());


            $em->persist($zaznam);
            $em->flush();
        }

//        return new Response('Totot je telo', Response::HTTP_BAD_GATEWAY);

        return new JsonResponse();
    }

    /**
     * @Route(path="/getData", methods={"POST"}, name="get_data_action")
     */
    public function getDataAction(Request $request, EntityManagerInterface $em)
    {
        $data = $request->request->get('data', null);
        /**
         * @var Zaznam $zaznam
         */
        $zaznam = $em->getRepository(Zaznam::class)->findOneBy([
            'den' => new \DateTime($data['den']),
            'linka'=> $data['linka'],
            'uep' => $data['uep'],
            'zmena' => $data['zmena']
        ]);

        if (empty($zaznam)) {
            $zaznam = new Zaznam();
            $zaznam->setDen( new \DateTime($data['den']));
            $zaznam->setLinka($data['linka']);
            $zaznam->setUep($data['uep']);
            $zaznam->setZmena($data['zmena']);

            $em->persist($zaznam);
            $em->flush();

            return new JsonResponse([
                'zaznamId' => $zaznam->getId(),
                'zaznamData' => $zaznam->toArray(),
            ]);
        } else {
            return new JsonResponse([
                'zaznamId' => $zaznam->getId(),
                'zaznamData' => $zaznam->toArray(),
            ]);
        }
    }


    //json


    /**
     * @Route ("/api",methods={"GET"}, name="linka_api")
     */
    public function jsonresponseAction () {

        // pre lepsie rozoznanie php stormu s pracou s polami, same mi napr. doplna nejake hodnoty
        /** @var Zaznam[] $zaznamy */
        //$zaznamy to je entita
        $zaznamy = $this->getDoctrine()->getRepository('App:Zaznam')->findAll();
        // vytvori docasne pole
        $zaznamyArr = [];
        //nieco ako cyklus for len s tym rozdielom ze vrati tolko zaznamov kolko je prvkov, vyuziva sa pri poliach
        // u ktorych neviem povedat presny pocet
        foreach ($zaznamy as $zaznam) {
            // objekt sme prehodili na pole
            $zaznamyArr[] = $zaznam->toArray();
        }
        //vytvori Jsonresponse - toto je skratka dolneho zapisu
        return new JsonResponse($zaznamyArr);

        // ked si zobrazim svoju stranku tak data su rozhadzane, dobre je preto si nainstalovat rozsirenie
        // pre svoj prehliadac, vola sa JSON Lite, kt. zobrazeny tie data ucelene...

    }

//// vytvori Json response
//    $response = new Response(json_encode($data), 200);
//    $response->headers->set('Content-Type', 'application/json');
//    return $response;




}






