<?php


namespace App\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use App\Entity\User;

class SecurityController extends AbstractController
{
    /**
     * @Route("/",name="login", methods={"POST","GET"})
     */
    public function login(Request $request,AuthenticationUtils $utils):Response
    {
        $error = $utils->getLastAuthenticationError();
        $lastUsername = $utils->getLastUsername();
        $user = new User();
        $session = new Session();
        $session = $request->getSession();
        $session->set('user',$user);
        return $this->render("security/homepage.html.twig",['last_username'=>$lastUsername,'error'=>$error]);
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logout(){

    }
}