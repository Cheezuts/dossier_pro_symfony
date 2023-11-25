<?php

namespace App\Service;

use App\Entity\Commentaire;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;


class CommentaireService
{
    private $manager;



    public function __construct(EntityManagerInterface $manager)
    {
        $this->manager = $manager;
    }

    public function persistCommentaire(Commentaire $commentaire): void
    {
        $commentaire->setIsPublished(false);
        $this->manager->persist($commentaire);
        $this->manager->flush();
    }
}
