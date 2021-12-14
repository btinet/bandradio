<?php

namespace App\Controller\Admin;

use App\Entity\ContentType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ContentTypeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ContentType::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title'),
            TextField::new('description'),
            AssociationField::new('template'),
        ];
    }

}
