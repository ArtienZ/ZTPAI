<?php


namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class KidsListController extends AbstractController
{
    /**
     * @Route("/kids")
     */
    public function kids(): Response{
        return $this->render("kids_list.html.twig");
    }
}