<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

class ParticulierController extends AbstractController
{
    /**
     * @Route("/particulier", name="particulier")
     */
    public function index()
    {
        return $this->render('particulier/index.html.twig', [
            'controller_name' => 'ParticulierController',
        ]);
    }
    /**
     * @Route("/redirect-after-login", name="particulier")
     */
    public function redirectAfterLogin(Security $security)
    {
        $user = $security->getUser();

        dump($user->getRoles());
        die('rrrr');
        return $this->render('particulier/index.html.twig', [
            'controller_name' => 'ParticulierController',
        ]);
    }
}
