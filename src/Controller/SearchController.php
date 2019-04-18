<?php

namespace App\Controller;

use App\Entity\Matricule;
use App\Entity\Personne;
use App\Form\PersonneForMatriculeType;
use App\Form\PersonneType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    /**
     * @Route("/search", name="search")
     */
    public function index(Request $request)
    {
        $personne = new Personne();
        $form = $this->createForm(PersonneType::class, $personne);

        dump('ici');
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            dump('la');
            $personnes =  $this->getDoctrine()
                ->getRepository(Personne::class)
                ->findPeoples($personne);

            dump($personnes);
            die();
        }

        return $this->render('search/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/search/matricule", name="search")
     */
    public function matricule(Request $request)
    {
        $personne = new Personne();
        $form = $this->createForm(PersonneForMatriculeType::class, $personne);

        dump('ici');
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            dump('la');
            $personnes =  $this->getDoctrine()
                ->getRepository(Matricule::class)
                ->findPeoples($personne);

            dump($personnes);
            die();
        }

        return $this->render('search/matricule.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
