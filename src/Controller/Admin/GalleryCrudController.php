<?php

namespace App\Controller\Admin;

use App\Entity\Gallery;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class GalleryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Gallery::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name', 'Nom'),
            SlugField::new('slug')->hideOnIndex()
                ->setTargetFieldName('name'),
            ImageField::new('cover', 'Photo de couverture')
                ->setBasePath('uploads/')
                ->setUploadDir('public/uploads/')
            ->setUploadedFileNamePattern('[randomhash].[extension]')
            ->setRequired(false),
        ];
    }
    
}
