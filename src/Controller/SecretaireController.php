<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Secretaire
{
    /**
     * @Route("/connexion_secretaire")
     */

    function ConnexionSecretaire()
    {
        return new Response("Future page de connexion de la secretaire");
    }
}