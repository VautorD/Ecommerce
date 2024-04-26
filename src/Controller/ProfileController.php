<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ProfileController extends AbstractController
{
    #[Route('/mon-compte', name: 'app_profile_index')]
public function index(): Response
{
    $user = $this->getUser(); // Assurez-vous que getUser() retourne un objet User
    if (!$user) {
        throw $this->createNotFoundException('Utilisateur non trouvé');
    }

    return $this->render('profile/index.html.twig', [
        'user' => $user,
        // 'commandes' => $user->getCommandes(),
    ]);
}

}
