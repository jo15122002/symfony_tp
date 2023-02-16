<?php

namespace App\Controller;

use App\Repository\LinkRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LinkController extends AbstractController
{
    #[Route('/link', name: 'link')]
    public function index(): Response
    {
        return $this->render('link/index.html.twig', [
            'controller_name' => 'LinkController',
        ]);
    }

    #[Route('/link/{id}', name: 'link_show')]
    public function show(LinkRepository $linkRepository, string $id): Response
    {
        $link = $linkRepository->find($id);
        return $this->render('link/show.html.twig', [
            'controller_name' => 'LinkController',
            'link' => $link
        ]);
    }

    #[Route('/link/delete/{id}', name: 'link_delete')]
    public function delete(LinkRepository $linkRepository, String $id): Response
    {
        $link = $linkRepository->find($id);
        $linkRepository->remove($link, true);
        return $this->redirectToRoute("home");
    }
}
