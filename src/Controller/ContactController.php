<?php

namespace App\Controller;

use DateTimeImmutable;
use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\ContactRepository;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/contact')]
class ContactController extends AbstractController
{
    #[Route('/emailTEST', name: 'app_emailTEST', methods: ['GET', 'POST'])]
    public function new(Request $request, ContactRepository $contactRepository, MailerInterface $mailer): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contact->setCreateAt(new DateTimeImmutable());
            $address = $contact->getEmail();
            $username = $contact->getUsername();

            $email = (new TemplatedEmail())
                ->from('hello@example.com')
                ->to($address)
                ->subject('Test Symfony Mailer!')
                ->text('Envoi en utilisant Symfony Mailer')
                //->htmlTemplate('emails/response.html.twig')
                ->context([
                    'username' => $username
                ]);

            $mailer->send($email);

            return $this->redirectToRoute('app_emailTEST', [], Response::HTTP_SEE_OTHER);
        }
        return $this->renderForm('emailTEST/emailTEST.html.twig', [
            'contact' => $contact,
            'form' => $form,
        ]);
    }
}
