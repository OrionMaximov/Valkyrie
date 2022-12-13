<?php

namespace App\Controller\Admin;

use App\Entity\Comics;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Form\Type\FileUploadType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ComicsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Comics::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            //IdField::new('id'),
            TextField::new('titre'),
            TextField::new('auteur'),
            TextField::new('tome'),
            NumberField::new('serie'),
            TextField::new('isbn'),
            NumberField::new('quantite'),
            NumberField::new('tarif'),
            BooleanField::new('etat'),
            NumberField::new('prix'),
            BooleanField::new('pervers'),
            ImageField::new('image')
                ->setFormType(FileUploadType::class)
                ->setBasePath('/uploads/upload/')
                ->setUploadDir('public/uploads/upload/')
                ->setUploadedFileNamePattern('Comics'.uniqid().'.jpg'),
        ];
    }
    
}
