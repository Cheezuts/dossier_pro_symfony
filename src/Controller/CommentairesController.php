<?php

namespace App\Controller;

use App\Entity\Commentaire;
use App\Form\CommentaireFormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CommentairesController extends AbstractController
{
    #[Route('/commentaires', name: 'app_commentaires')]
    public function index(Request $request): Response
    {
        // Créer une instance de l'entité Commentaire
        $commentaire = new Commentaire();

        // Créer le formulaire en utilisant le CommentaireFormType
        $form = $this->createForm(CommentaireFormType::class, $commentaire);

        // Gérer la soumission du formulaire
        $form->handleRequest($request);

        // Vérifier si le formulaire a été soumis et est valide
        if ($form->isSubmitted() && $form->isValid()) {
            // Traitement du formulaire ici, par exemple sauvegarde en base de données

            // Redirection vers la page suivante après traitement du formulaire
            return $this->redirectToRoute('app_commentaires');
        }

        // Afficher le formulaire dans votre vue
        return $this->render('commentaires/index.html.twig', [
            'controller_name' => 'CommentairesController',
            'form' => $form->createView(), // Assurez-vous que cette ligne est présente
        ]);
    }
}
