<?php

namespace App\Controller\Admin;

use App\Entity\ViewType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ViewTypeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ViewType::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title'),
            TextField::new('description'),
            BooleanField::new('hasTitle'),
            BooleanField::new('hasDescription'),
            BooleanField::new('hasContent'),
            BooleanField::new('hasImage'),

            TextField::new('template'),
        ];
    }

}
