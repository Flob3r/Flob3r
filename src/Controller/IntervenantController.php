<?php

namespace App\Controller;

use App\Entity\Intervenant;
use App\Form\IntervenantFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class IntervenantController extends AbstractController
{
    /**
     * @Route("/connexion_intervenant")
     */

    function ConnexionIntervenant(){
        return new Response("Future page de connexion de l'intervenant");
    }

    /**
     * @Route("/inscription_intervenant")
     */

    function InscriptionIntervenant(Request $request){
        $task = new Intervenant();

        $form = $this->createForm(IntervenantFormType::class, $task);

	    $form->handleRequest($request);

	if($form->isSubmitted() && $form->isValid()){
		$task = $form->getData();

		$entityManager = $this->getDoctrine()->getManager();
		$entityManager->persist($task);
		$entityManager->flush();

		return $this->redirectToRoute('newIntervenant_success');
	}

        return $this->render('intervenant/intervenant_create.html.twig', ['intervenantForm'=>$form->createView(), ]);
    }

    /**
     * @Route("/list_intervenant")
     */

    function listIntervenant(){
        $intervenants = $this->getDoctrine()->getRepository(Intervenant::class)->findAll();
        return $this->render('intervenant/list_intervenant.html.twig', ['Intervenants'=>$intervenants,]);
    }

}