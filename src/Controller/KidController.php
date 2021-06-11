<?php

namespace App\Controller;

use App\Entity\Kid;
use App\Entity\User;
use http\Env\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
class KidController extends AbstractController
{
    /**
     * @Route("/kid", name="kid")
     */
    public function index(): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $user = new User();
        $user->setName("Kid_1");
        $user->setSurname("kid1_surname");
        $user->setEmail("kid1@email.com");
        $plainPassword = "kid1pass";
        $user->setPassword(password_hash($plainPassword,PASSWORD_BCRYPT));
        $user->setPhone("222333444");
        $user->setRole(3);
        $user_kid = new Kid();
        $user_kid->setAge(15);
        $user_kid->setDiagnosisFiles("kid1_diagnosis");
        $user_kid->setParentName("kid1_parent_name");
        $user_kid->setParentSurname("kid1_parent_surname");
        $user_kid->setTherapist("kid1_therapist");
        $user->addKidsID($user_kid);
        $entityManager->persist($user);
        $entityManager->persist($user_kid);
        $entityManager->flush();
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
            'name'=>$user_kid->getName(),
            'surname'=>$user_kid->getSurname()
        ]);
    }
    public function show_all_kids(Request $request):Response{
        $kids = $this->getDoctrine()->getRepository(Kid::class)->findAll();
        return $this->json($kids);
    }
    public function createAction(Request $request):Response{
        return $this->json('');
    }
}
