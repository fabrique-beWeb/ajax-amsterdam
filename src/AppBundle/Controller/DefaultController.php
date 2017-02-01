<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Quartier;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig');
    }
    
    
    /**
     * @Route("/quartier/add")
     */
    public function ajoutQuartier(Request $request)
    {
        $quartier = new Quartier();
        $quartier->setNom($request->get('nom'));
        $quartier->setNbHabitants($request->get('nbHabitants'));
        $this->getDoctrine()->getManager()->persist($quartier);
        $this->getDoctrine()->getManager()->flush();
        
        
        return $this->redirectToRoute("getQuartiers");
    }
    /**
     * @Route("/quartiers",name="getQuartiers")
     */
    public function getQuartiers(Request $request)
    {
        $quartiers = $this->getDoctrine()->getRepository(Quartier::class)->findAll();
        
        return new JsonResponse($quartiers);
//        return new JsonResponse($quartiers);
    }
}
