<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     * @param Request $request
     * @param \Swift_Mailer $mailer
     * @return RedirectResponse | Response
     */
    public function index(Request $request, \Swift_Mailer $mailer)
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $datas = $form->getData();
            $this->sendMail($datas, $mailer);
        }

        return $this->render('contact/index.html.twig', [
            'contactForm' => $form->createView(),
        ]);
    }

    /**
     * Envoi d'un mail avec SwiftMailer
     * @param $datas
     * @param \Swift_Mailer $mailer
     */
    private function sendMail($datas, \Swift_Mailer $mailer)
    {
        $message = new \Swift_Message();
        $message->setSubject($datas['object']);
        $message->setFrom('noreply@monsite.fr');
        $message->setTo('admin@monsite.fr   ');
        $message->setBody(
            $this->renderView('contact/modele.html.twig', [
                'datas' => $datas
            ]),
            'text/html'
        );

        $mailer->send($message);
    }
}
