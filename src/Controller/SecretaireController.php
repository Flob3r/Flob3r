<?php

namespace App\Controller;

use DateTime;
use App\Entity\Calendrier;
use App\Entity\Matiere;
use App\Form\CalendrierFormType;
use App\Form\MatiereFormType;
use Doctrine\Persistence\ManagerRegistry;
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
        return $this->render('secretaire/matiere_delete.html.twig');
    }



    /**
     * @Route ("/calendrier")
     */

    function voirCalendrier(){
        $date = $this->getDoctrine()->getRepository(Calendrier::class)->findAll();

        return $this->render('calendrier/calendrier.html.twig', ['Calendriers'=>$date,]);
    }

    /**
     * @Route ("/calendrier/{id}/edit", name="calendar_event_edit", methods={"PUT"})
     */

    function editCalendrier(ManagerRegistry $doctrine, ?Calendrier $calendrier, Request $request){
        $data = json_decode($request->getContent());

        if
        (
            isset($data->title) && !empty($data->title) &&
            isset($data->start) && !empty($data->start) &&
            isset($data->end) && !empty($data->end)
        ){
            //Complet
            $status_code = 200;

            if(!$calendrier){
                $calendrier = new Calendrier();

                $status_code = 201;
            }

            $calendrier->setNomCours($data->title);
            $calendrier->setDateStart(new DateTime($data->start));
            $calendrier->setDateEnd(new DateTime($data->end));

            $em = $doctrine->getManager();
            $em->persist($calendrier);
            $em->flush();

            return new Response("OK", $status_code);

        }else{
            return new Response("NOT FOUND", 404);
        }


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
        return $this->render('secretaire/calendrier_delete_date.html.twig');
    }

}