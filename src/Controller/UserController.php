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
        // Renvoi des utilisateurs à la vue
        return $this->render('user/list.html.twig', [
            'users' => $users
        ]);
    }

    /**
     * @Route("/back-office/utilisateurs/changement-roles/{id}",name="app_user_editrole", requirements={"id"="[0-9]+"})
     * @param int $id
     * @return Response
     */
    public function edit(int $id): Response
    {
        // Récupération du Repository
        $repo = $this->getDoctrine()->getRepository(User::class);
        // Récupération des utilisateurs
        $user = $repo->findOneBy([
            'id' => $id
        ]);

        // Renvoi des utilisateurs à la vue
        return $this->render('user/show.html.twig', [
            'user' => $user
        ]);
    }
}