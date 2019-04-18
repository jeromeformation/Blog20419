<?php

namespace App\Controller;

use App\Entity\CategoryPrestation;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PrestationController extends AbstractController
{
    /**
     * @Route("/prestation", name="prestation")
     */
    public function index()
    {
        $repository = $this->getDoctrine()->getRepository(CategoryPrestation::class);
        $categories = $repository->findAll();

        return $this->render('prestation/index.html.twig', [
            'categories' => $categories
        ]);
    }
}
