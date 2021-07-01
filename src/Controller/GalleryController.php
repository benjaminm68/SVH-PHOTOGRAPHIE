<?php

namespace App\Controller;

use App\Repository\GalleryRepository;
use App\Repository\PhotoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GalleryController extends AbstractController
{
      /**
     * @Route("/galerie", name="gallery")
     */
    public function gallery(GalleryRepository $galleryRepository): Response
    {

        $galeries = $galleryRepository->findAll();


        return $this->render('front/gallery.html.twig',[
            'galeries' => $galeries
        ]);
    }

     /**
     * @Route("/galerie/{slug}", name="gallery_detail")
     */
    public function detailGallery(GalleryRepository $galleryRepository, PhotoRepository $photoRepository, $slug): Response
    {

        $galeries = $galleryRepository->findAll();
        $galerie = $galleryRepository->findOneBySlug($slug);
        


        return $this->render('front/detail-gallery.html.twig',[
            'galeries' => $galeries,
            'galerie' => $galerie
        ]);
    }
}
