<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Photo;
use App\Entity\Client;
use App\Entity\Gallery;
use App\Entity\Shooting;
use App\Repository\PhotoRepository;
use App\Repository\GalleryRepository;
use App\Repository\ShootingRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    /**
     * @IsGranted("ROLE_ADMIN")
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
        yield MenuItem::section('Utilisateurs');
        yield MenuItem::linkToCrud('Utilisateurs', 'fa fa-user', User::class);
        yield MenuItem::section('Clients');
        yield MenuItem::linkToCrud('Clients', 'fa fa-user', Client::class);
        yield MenuItem::linkToCrud('Shootings', 'fa fa-tag', Shooting::class);
        yield MenuItem::section('Galerie');
        yield MenuItem::linkToCrud('Galeries', 'fas fa-list', Gallery::class);
        yield MenuItem::linkToCrud('Photos', 'fas fa-images', Photo::class);
    }
}
