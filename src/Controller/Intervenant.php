<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Intervenant
{
    /**
     * @Route("/connexion_intervenant")
     */

    function ConnexionIntervenant()
    {
        return new Response("Future page de connexion de l'intervenant");
    }
}