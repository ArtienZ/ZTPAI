<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class SearchController extends AbstractController
{
    /**
     * @Route("/therapists")
     */
    public function therapists():Response{
        return $this->render('therapist_list.html.twig');
    }

}