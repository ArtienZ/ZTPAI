<?php


namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class AddTherapistController extends AbstractController
{
    /**
     * @Route("/add_therapist")
     */
    public function add_therapist_page(): Response
    {
        return $this->render("add_therapist.html.twig", ['user_type' => "kid"]);
    }
}