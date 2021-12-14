<?php

namespace App\Controller\Admin;

use App\Entity\View;
use App\Entity\ViewType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\DomCrawler\Field\ChoiceFormField;

class ViewCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return View::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title'),
            TextField::new('description'),
            AssociationField::new('viewTypes'),
            AssociationField::new('contentTypes'),
            AssociationField::new('tags'),
            ChoiceField::new('sortPostsBy')->setChoices(['erstellt am' => 'created','geändert am' => 'updated']),
            ChoiceField::new('orderBy')->setChoices(['aufsteigend' => 'asc','absteigend' => 'desc']),
            NumberField::new('numberOfPosts','Limit Posts'),

        ];
    }

}
