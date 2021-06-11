<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Therapist;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TherapistController extends AbstractController
{
    /**
     * @Route("/therapist", name="therapist")
     */
    public function index(): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $user = new User();
        $user->setName("Therapist_1");
        $user->setSurname("Therapist_1_surname");
        $user->setEmail("therapist1@email.com");
        $plainPassword = "therapist1pass";
        $user->setPassword(password_hash($plainPassword,PASSWORD_BCRYPT));
        $user->setPhone("222333444");
        $user->setRole(2);
        $user_therapist = new Therapist();
        $user_therapist->setAccountNumber("1111222244445555");
        $user_therapist->setHourlyRate("test rate");
        $user_therapist->setSpecialization("test specialization");
        $user_therapist->setUserID($user);
        $user->setTherapist($user_therapist);
        $entityManager->persist($user);
        $entityManager->persist($user_therapist);
        $entityManager->flush();
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
            'name'=>$user_therapist->getUserID()->getName(),
            'surname'=>$user_therapist->getUserID()->getSurname()
        ]);
    }
}
