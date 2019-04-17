<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ContactPersoController extends AbstractController
{
    /**
     * @Route("/contact/perso", name="contact_perso")
     */
    public function index(Request $request)
    {
        $datas = $request->request;

        dump($datas);

        return $this->render('contact_perso/index.html.twig', [
            'controller_name' => 'ContactPersoController',
        ]);
    }
}
