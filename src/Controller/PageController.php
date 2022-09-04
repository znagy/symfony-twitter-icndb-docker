<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PageController extends AbstractController
{
    #[Route('/hello', name: 'app_page')]
    public function hello(): Response
    {
        return $this->render('page/hello.html.twig', [
            'message' => 'Hello World',
        ]);
    }
}
