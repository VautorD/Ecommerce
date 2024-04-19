<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


#[Route('/admin/utilisateurs')]
class UsersController extends AbstractController
{
    #[Route('', name: 'app_admin_users')]
    public function index(): Response
    {
        return $this->render('admin/users/index.html.twig', [
            'controller_name' => 'ProfileController',
        ]);
    }
}