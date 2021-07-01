<?php

namespace App\Controller;

use App\Entity\Gallery;
use App\Repository\GalleryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home(GalleryRepository $galleryRepository): Response
    {
    $galeries = $galleryRepository->findAll();
        return $this->render('front/home.html.twig',[
            'galeries' => $galeries
        ]);
    }
}
