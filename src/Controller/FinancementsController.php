<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FinancementsController extends AbstractController
{
    #[Route('/financements', name: 'app_financements')]
    public function index(): Response
    {
        return $this->render('financements/index.html.twig', [
            'controller_name' => 'FinancementsController',
        ]);
    }
}
