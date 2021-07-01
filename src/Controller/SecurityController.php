<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login_staff")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        return $this->render('security/login.html.twig', [
            "lastUsername" => $authenticationUtils->getLastUsername(),
            "error" => $authenticationUtils->getLastAuthenticationError()
        ]);
    }

    /**
     * @Route("/client/login", name="app_login_client")
     */
    public function clientLogin(AuthenticationUtils $authenticationUtils): Response
    {
        return $this->render('security/client-login.html.twig', [
            "lastUsername" => $authenticationUtils->getLastUsername(),
            "error" => $authenticationUtils->getLastAuthenticationError()
        ]);
    }


    /**
     * @Route("/logout", name="app_logout_staff")
     */
    public function logout()
    {
    }

    /**
     * @Route("/client/logout", name="app_logout_client")
     */
    public function logoutClient()
    {
    }
}
