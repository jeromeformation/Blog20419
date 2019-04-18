<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PersonnController extends AbstractController
{
    /**
     * @Route("/personn", name="personn")
     */
    public function index()
    {
        return $this->render('personn/index.html.twig', [
            'controller_name' => 'PersonnController',
        ]);
    }
}
