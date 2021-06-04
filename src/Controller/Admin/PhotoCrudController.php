<?php

namespace App\Controller\Admin;

use App\Entity\Photo;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PhotoCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Photo::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('name'),
            AssociationField::new('galerie'),
            ImageField::new('path')
            ->setBasePath(' uploads/')
            ->setUploadDir('public/uploads/')
        ->setUploadedFileNamePattern('[randomhash].[extension]')
        ->setRequired(false),
        ];
    }
    
}
