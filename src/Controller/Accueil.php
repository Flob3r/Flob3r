<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class Accueil extends AbstractController
{
    /**
     * @Route("/")
     */

    function accueil()
    {
        return $this->render('accueil.html.twig');
    }
}