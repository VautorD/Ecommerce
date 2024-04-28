<?php

// src/Controller/SearchController.php

namespace App\Controller;

use App\Entity\Produit;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;


class SearchController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/search", name="search")
     */
    public function search(Request $request): Response
    {
        $term = $request->query->get('q');
       
        $repository = $this->entityManager->getRepository(Produit::class);
        $produits = $repository->findByPartialNom($term);

        return $this->render('search/results.html.twig', [
            'term' => $term,
            'produits' => $produits,
        ]);
    }
}
