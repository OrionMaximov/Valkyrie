<?php

namespace App\Controller\Admin;

use App\Entity\Mangas;
use Gumlet\ImageResize;
use App\Form\MangasType;
use App\Repository\MangasRepository;
use App\Controller\Admin\UserCrudController;
use Symfony\Component\HttpFoundation\Request;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use Symfony\Component\DomCrawler\Field\FileFormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Form\Type\FileUploadType;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class MangasCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Mangas::class;
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
                ->setUploadedFileNamePattern('Manga'.uniqid().'.jpg'),
                
       ];
    }
    

   
    

}       
    