<?php
namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/back-office/utilisateurs")
     * @return Response
     */
    public function list(): Response
    {
        // Récupération du Repository
        $repo = $this->getDoctrine()->getRepository(User::class);
        // Récupération des utilisateurs
        $users = $repo->findAll();
        // Envoi des utilisateurs à la vue
        return $this->render('user/list.html.twig', [
            'users' => $users
        ]);
    }
}
