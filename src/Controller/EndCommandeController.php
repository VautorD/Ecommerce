<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class EndCommandeController extends AbstractController
{
    #[Route('/end/commande', name: 'app_end_commande')]
    public function index(): Response
    {
        return $this->render('end_commande/index.html.twig', [
            'controller_name' => 'EndCommandeController',
        ]);
    }
}
