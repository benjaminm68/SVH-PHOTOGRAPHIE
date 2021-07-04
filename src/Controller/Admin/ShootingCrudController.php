<?php

namespace App\Controller\Admin;

use App\Entity\Shooting;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ShootingCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Shooting::class;
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
            AssociationField::new('client'),
        ];
    }
    
}
