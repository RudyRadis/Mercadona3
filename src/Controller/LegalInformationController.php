<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LegalInformationController extends AbstractController
{
    #[Route('/informations-legales', name: 'app_legal_information')]
    public function index(): Response
    {
        return $this->render('legal_information/index.html.twig', [
            'controller_name' => 'LegalInformationController',
            'showNavbar' => true,
        ]);
    }
}
