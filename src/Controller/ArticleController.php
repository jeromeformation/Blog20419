<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Comment;
use App\Form\ArticleType;
use App\Form\CommentFrontType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    /**
     * @Route("/", name="article_list")
     */
    public function index()
    {
        // Récupération du Repository
        $repository = $this->getDoctrine()->getRepository(Article::class);
        // Récupération des articles
        $articles = $repository->findAll();

        return $this->render('article/index.html.twig', [
            'articles' => $articles
        ]);
    }

    /**
     * @Route("/article/creation", name="article_create")
     * @param Request $request
     * @return Response
     * @throws \Exception
     */
    public function create(Request $request): Response
    {
        // Récupération du formulaire
        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article);

        // On "remplit" le formulaire avec les données postées
        $form->handleRequest($request);

        // On vérifie que le formulaire est soumis et ses valeurs sont valides
        if ($form->isSubmitted() && $form->isValid()) {
            // Récupération du manager
            $manager = $this->getDoctrine()->getManager();
            // Insertion de l'article en BDD
            $manager->persist($article); // Préparation du SQL
            $manager->flush(); // Exécution du SQL
            // Ajout d'un message flash
            $this->addFlash('success', 'Votre article bien été ajouté');
            // Redirection vers le détail de l'article
            return $this->redirectToRoute('article_show', [
                'id' => $article->getId()
            ]);
        }

        // Envoi du formulaire à la vue
        return $this->render('article/create.html.twig', [
            'createForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/article/{id}", name="article_show")
     * @param Article $article
     * @param Request $request
     * @return Response
     */
    public function show(Article $article, Request $request)
    {
        // Création du formulaire pour l'ajout de commentaire
        $commentForm = $this->createFormComment($article);

        // Gestion de l'ajout d'un commentaire
        $commentForm->handleRequest($request);
        if ($commentForm->isSubmitted() && $commentForm->isValid()) {
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($commentForm->getData());
            $manager->flush();
            $commentForm = $this->createFormComment($article);
        }

        return $this->render('article/show.html.twig', [
            'article' => $article,
            'commentForm' => $commentForm->createView()
        ]);
    }

    /**
     * Créé un formulaire pour ajouter un nouveau comment à un article
     * @param Article $article
     * @return \Symfony\Component\Form\FormInterface
     */
    private function createFormComment(Article $article)
    {
        // Création d'un nouveau formulaire
        $comment = new Comment();
        $comment->setArticle($article);
        return $this->createForm(CommentFrontType::class, $comment);
    }

    /**
     * @Route("/article/{id}/modification", name="article_update")
     * @param Article $article
     * @param Request $request
     * @return Response
     */
    public function edit(Article $article, Request $request): Response
    {
        // Récupération du formulaire
        $form = $this->createForm(ArticleType::class, $article);

        // Remplir le formulaire avec les variables $_POST
        $form->handleRequest($request);

        // On vérifie que le formulaire est soumis et valide
        if ($form->isSubmitted() && $form->isValid()) {
            // Récupération du manager
            $manager = $this->getDoctrine()->getManager();
            // Mis à jour en BDD
            $manager->flush();
            // Ajout du message flash
            $this->addFlash('primary', 'Votre article a bien été modifié');
            // Redirection vers le détail de l'article
            return $this->redirectToRoute('article_show', [
                'id' => $article->getId()
            ]);
        }

        return $this->render('article/update.html.twig', [
            'editForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/article/{id}/suppression", name="article_delete")
     * @param Article $article
     * @return Response
     */
    public function delete(Article $article): Response
    {
        // Récupération du manager
        $manager = $this->getDoctrine()->getManager();
        // Suppression de l'article
        $manager->remove($article);
        $manager->flush();
        // Ajout d'un message flash
        $this->addFlash('danger', 'Votre article a bien été supprimé');
        // Redirection vers la liste des articles
        return $this->redirectToRoute('article_list');
    }
}
