<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GoogleMapController extends AbstractController
{
    #[Route('/google/map', name: 'app_google_map')]
    public function index(): Response
    {
        return $this->render('google_map/index.html.twig', [
            'controller_name' => 'GoogleMapController',
        ]);
    }
}
