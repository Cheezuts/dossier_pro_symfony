<?php

namespace App\Controller;

use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MailController extends AbstractController
{
    #[Route('/mail', name: 'app_mail')]
    public function index(MailerInterface $mailer): Response
    {

        $email = (new TemplatedEmail())
            ->from('test@test.com')
            ->to('test@test.com ')
            ->subject('Test email')
            ->htmlTemplate('emails/mail.html')
            ->context([
                'nom' => 'test',
                'prenom' => 'test',
                'job' => 'test',
                'presentation' => 'test',
            ]);

        $mailer->send($email);

        return $this->render('mail/index.html.twig', [
            'controller_name' => 'MailController',
        ]);
    }
}
