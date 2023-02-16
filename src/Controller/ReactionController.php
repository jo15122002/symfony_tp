<?php

namespace App\Controller;

use App\Entity\Reaction;
use App\Repository\LinkRepository;
use App\Repository\ReactionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReactionController extends AbstractController
{
    #[Route('/reaction/add/{id}', name: 'reaction_vote')]
    public function add(Request $request, LinkRepository $linkRepository, ReactionRepository $reactionRepository, string $id): Response
    {
        $reaction = new Reaction();
        $link = $linkRepository->find($id);
        $reaction->setLink($link)
            ->setType($request->query->get("type"));

        $reactionRepository->save($reaction, true);
        return $this->redirectToRoute("home");
    }
}
