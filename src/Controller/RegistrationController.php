<?php
namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationParticulierType;
use FOS\UserBundle\Model\UserManager;
use FOS\UserBundle\Model\UserManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class RegistrationController extends AbstractController
{
    /**
     * @Route("/mbe", name="banque")
     */
    public function banque()
    {
        return $this->render('banque/index.html.twig');
    }

    /**
     * @Route("/mbe/inscription/particulier", name="mbe_registration_particulier")
     * @param Request $request
     * @param UserManagerInterface $userManager
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function registerParticulier(Request $request, UserManagerInterface $userManager)
    {
        $user = new User();
        $user->addRole('ROLE_PARTICULIER');
        $form = $this->createForm(RegistrationParticulierType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $userManager->updateUser($user);
            $this->addFlash('success', 'Compte particulier créé');
            return $this->redirectToRoute('banque');
        }

        return $this->render('banque/register-particulier.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/mbe/inscription/entreprise", name="mbe_registration_entreprise")
     * @param Request $request
     * @param UserManagerInterface $userManager
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function registerEntreprise(Request $request, UserManagerInterface $userManager)
    {
        $user = new User();
        $user->addRole('ROLE_ENTREPRISE');
        $form = $this->createForm(RegistrationParticulierType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $userManager->updateUser($user);
            $this->addFlash('success', 'Compte entreprise créé');
            return $this->redirectToRoute('banque');
        }

        return $this->render('banque/register-entreprise.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}