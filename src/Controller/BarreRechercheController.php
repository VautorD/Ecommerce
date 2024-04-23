<?php

// src/Controller/BarreRechercheController.php

// src/Controller/BarreRechercheController.php

// src/Controller/BarreRechercheController.php

namespace App\Controller;

use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BarreRechercheController extends AbstractController
{
    #[Route('/barre/recherche', name: 'app_barre_recherche')]
    public function index(Request $request, ProduitRepository $produitRepository): Response
    {
        $searchTerm = $request->query->get('search');

        // Vérifie si le terme de recherche est défini
        if ($searchTerm) {
            // Utilise la méthode de recherche du repository Produit pour récupérer les résultats
            $results = $produitRepository->search($searchTerm);
        } else {
            $results = [];
        }

        return $this->render('base.html.twig', [
            'searchTerm' => $searchTerm,
            'results' => $results,
        ]);
    }
}
