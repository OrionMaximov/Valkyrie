<?php

namespace App\Controller\Admin;

use App\Entity\Mangas;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\DomCrawler\Field\FileFormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class MangasCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Mangas::class;
    }
  
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('titre'),
            TextField::new('auteur'),
            TextField::new('isbn'),
            TextField::new('quantite'),
            NumberField::new('tarif'),
            BooleanField::new('etat'),
            NumberField::new('prix'),
            BooleanField::new('pervers'),
            TextField::new('image')
                ->setFormType(FileType::class),
            
        ];
    }
    
}
