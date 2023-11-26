<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ArticleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Article::class;
    }


    public function configureFields(string $pageName): iterable
    {
        yield TextareaField::new('Titre');
        yield TextareaField::new('Texte');
        yield TextareaField::new('imageFile')->setFormType(VichImageType::class)->hideOnIndex();
        yield ImageField::new('imageName')->setBasePath('/images/article')->hideOnForm();
    }
}
