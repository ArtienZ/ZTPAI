<?php


namespace App\Controller;
use App\Entity\Exercises;
use http\Env\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ExercisesController extends AbstractController
{
    /**
     * @Route("/exercises", name="exercises")
     */
    public function exercises(): Response{
        return $this->render("exercises.html.twig");
    }
}