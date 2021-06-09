<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class KidController extends AbstractController
{
    /**
     * @Route("/kid", name="kid")
     */
    public function index(): Response
    {
        return $this->render('kid/index.html.twig', [
            'controller_name' => 'KidController',
        ]);
    }
}
