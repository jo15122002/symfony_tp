<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccountController extends AbstractController
{
    #[Route('/account/settings', name: 'account_settings')]
    public function index(): Response
    {
        return $this->render('account/settings.html.twig', [
            'controller_name' => 'AccountController',
        ]);
    }
}
