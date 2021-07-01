<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Category;
use App\Entity\Client;
use App\Entity\Gallery;
use App\Entity\Photo;
use App\Entity\Shooting;
use App\Repository\GalleryRepository;
use App\Repository\PhotoRepository;
use App\Repository\ShootingRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function easyAdminHome(GalleryRepository $galleryRepository, PhotoRepository $photoRepository , ShootingRepository $shootingRepository): Response
    {

        $galeries = $galleryRepository->findAll();
        $photos = $photoRepository->findAll();
        $shootings = $shootingRepository->findAll();

        return $this->render('admin/dashboard.html.twig',[
            'galeries' => $galeries,
            'photos' => $photos,
            'shootings' => $shootings,
        ]);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('SVH - ADMINISTRATION');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Utilisateurs', 'fa fa-user', User::class);
        yield MenuItem::linkToCrud('Clients', 'fa fa-user', Client::class);
        yield MenuItem::linkToCrud('Catégories', 'fas fa-list', Category::class);
        yield MenuItem::linkToCrud('Galeries', 'fas fa-list', Gallery::class);
        // yield MenuItem::linkToCrud('Shootings Client', 'fa fa-tag', Shooting::class);
        yield MenuItem::linkToCrud('Photos', 'fas fa-images', Photo::class);
    }
}
