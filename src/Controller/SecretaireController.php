<?php

namespace App\Controller;

use App\Entity\Calendrier;
use App\Entity\Matiere;
use App\Form\CalendrierFormType;
use App\Form\MatiereFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class SecretaireController extends AbstractController
{
    /**
     * @Route("/connexion_secretaire")
     */

    function ConnexionSecretaire()
    {
        return new Response("Future page de connexion de la secretaire");
    }

    /**
     * @Route("/matieres")
     */

    function listMatieres(){
        $matieres = $this->getDoctrine()->getRepository(Matiere::class)->findAll();
        return $this->render('secretaire/list_matieres.html.twig', ['Matieres'=>$matieres,]);
    }

    /**
     * @Route("/matieres/ajouter")
     */

    function ajouterMatieres(Request $request){

        #Create a new date for calendar
        $task = new Matiere();

        $matiere = $this->createForm(MatiereFormType::class, $task);

        $matiere->handleRequest($request);

        if($matiere->isSubmitted() && $matiere->isValid()){
            $task = $matiere->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($task);
            $entityManager->flush();

            return $this->redirectToRoute('newMatiere_success');
        }

        return $this->render('secretaire/matiere_add.html.twig', ['MatiereForm'=>$matiere->createView(), ]);

    }


    /**
     * @Route ("/matieres/supprimer")
     */

    function deleteMatieres(){
        $repository = $this->getDoctrine()->getRepository(Matiere::class);
        $matiere = $repository->findAll();
        $entityManager = $this->getDoctrine()->getManager();
        foreach ($matiere as $matieres) {
            $entityManager->remove($matieres);
        }
        $entityManager->flush();
        return new Response("Matieres reset");
    }



    /**
     * @Route ("/calendrier")
     */

    function voirCalendrier(){
        $date = $this->getDoctrine()->getRepository(Calendrier::class)->findAll();

        return $this->render('calendrier/calendrier.html.twig', ['Calendriers'=>$date,]);
    }

    /**
     * @Route ("/calendrier/ajouter")
     */

    function AjouterDate(Request $request){
        #Create a new date for calendar
        $task = new Calendrier();

        $calendar = $this->createForm(CalendrierFormType::class, $task);

        $calendar->handleRequest($request);

        if($calendar->isSubmitted() && $calendar->isValid()){
            $task = $calendar->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($task);
            $entityManager->flush();



            return $this->redirectToRoute('newDateCalendar_success');
        }

        return $this->render('secretaire/calendrier_add_date.html.twig', ['CalendrierForm'=>$calendar->createView(), ]);
    }

    /**
     * @Route ("/calendrier/supprimer")
     */

    function deleteCalendrier(){
        $repository = $this->getDoctrine()->getRepository(Calendrier::class);
        $date = $repository->findAll();
        $entityManager = $this->getDoctrine()->getManager();
        foreach ($date as $dates) {
            $entityManager->remove($dates);
        }
        $entityManager->flush();
        return new Response("Calendrier reset");
    }

}