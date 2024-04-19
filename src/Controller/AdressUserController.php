<?php

namespace App\Controller;

use App\Entity\AdressUser;
use App\Form\AdressUserType;
use App\Repository\AdressUserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/adress/user')]
class AdressUserController extends AbstractController
{
    #[Route('/', name: 'app_adress_user_index', methods: ['GET'])]
    public function index(AdressUserRepository $adressUserRepository): Response
    {
        return $this->render('adress_user/index.html.twig', [
            'adress_users' => $adressUserRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_adress_user_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $adressUser = new AdressUser();
        $form = $this->createForm(AdressUserType::class, $adressUser);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($adressUser);
            $entityManager->flush();

            return $this->redirectToRoute('app_end_commande', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('adress_user/new.html.twig', [
            'adress_user' => $adressUser,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_adress_user_show', methods: ['GET'])]
    public function show(AdressUser $adressUser): Response
    {
        return $this->render('adress_user/show.html.twig', [
            'adress_user' => $adressUser,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_adress_user_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, AdressUser $adressUser, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(AdressUserType::class, $adressUser);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_adress_user_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('adress_user/edit.html.twig', [
            'adress_user' => $adressUser,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_adress_user_delete', methods: ['POST'])]
    public function delete(Request $request, AdressUser $adressUser, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$adressUser->getId(), $request->getPayload()->get('_token'))) {
            $entityManager->remove($adressUser);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_adress_user_index', [], Response::HTTP_SEE_OTHER);
    }
}
