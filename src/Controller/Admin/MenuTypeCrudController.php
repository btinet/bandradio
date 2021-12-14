<?php

namespace App\Controller\Admin;

use App\Entity\MenuType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class MenuTypeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MenuType::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title'),
            TextField::new('description'),
        ];
    }

}
