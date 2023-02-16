<?php

namespace App\Controller;

use App\Entity\Link;
use App\Form\Type\LinkType;
use App\Repository\LinkRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class LinkController extends AbstractController
{
    #[Route('/link/add', name: 'link_add')]
    public function add(Request $request, LinkRepository $linkRepository): Response
    {
        $link = new Link();

        $form = $this->createForm(LinkType::class, $link);

        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            // $form->getData() holds the submitted values
            // but, the original `$link` variable has also been updated
            $link = $form->getData();

            // ... perform some action, such as saving the link to the database

            $linkRepository->save($link, true);

            return $this->redirectToRoute('home');
        }


        return $this->render('link/add.html.twig', [
            'controller_name' => 'LinkController',
            'form' => $form->createView()
        ]);
    }

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
