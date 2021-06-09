<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserController extends AbstractController
{
    /**
     * @Route("/user", name="user")
     */

    public function index(UserPasswordEncoderInterface $encoder): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $user = new User();
        $user->setName("User 1");
        $user->setSurname("surname 1");
        $user->setEmail("user1@email.com");
        $plainPassword = "pass";
        $encoded = $encoder->encodePassword($user,$plainPassword);
        $user->setPassword($encoded);
        $user->setPhone("111222333");
        $user->setRole(1);
        $entityManager->persist($user);
        $entityManager->flush();
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
            'name'=>$user->getName(),
            'surname'=>$user->getSurname()
        ]);
    }
}
