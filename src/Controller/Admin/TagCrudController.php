<?php

namespace App\Controller\Admin;

use App\Entity\Tag;
use App\Field\VichTagImageField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class TagCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Tag::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            VichTagImageField::new('image')->hideOnForm(),
            TextField::new('title'),
            VichTagImageField::new('imageFile')->onlyOnForms(),
        ];
    }

}
