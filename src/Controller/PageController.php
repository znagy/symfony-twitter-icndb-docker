<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PageController extends AbstractController
{
    #[Route(
        '/{handle1}/{handle2}/{method}',
        name: 'app_index',
        condition: "params['handle1'] !== params['handle2'] && params['method'] in ['mod', 'fib']"
    )]
    public function index(string $handle1, string $handle2, string $method = 'fib'): Response
    {
        return $this->render('page/index.html.twig', [
            'message' => 'Index',
            'params' => "{$handle1} / {$handle2} / {$method}",
        ]);
    }

    #[Route('/hello', name: 'app_hello')]
    public function hello(): Response
    {
        return $this->render('page/hello.html.twig', [
            'message' => 'Hello World',
        ]);
    }
}
