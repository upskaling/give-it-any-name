<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    #[Route('/', name: 'app_index')]
    public function index(): Response
    {
        return $this->render('index.html.twig');
    }

    #[Route('/ok', name: 'app_ok')]
    public function ok(): Response
    {
        $this->getUser();
        return $this->render('user.html.twig')->setSharedMaxAge(3600);
    }

    #[Route('/miss', name: 'app_miss')]
    public function miss(): Response
    {
        $this->getUser();
        $this->getUser();
        return $this->render('user.html.twig')->setSharedMaxAge(3600);
    }
}
