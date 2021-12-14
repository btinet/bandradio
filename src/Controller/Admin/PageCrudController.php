<?php

namespace App\Controller\Admin;

use App\Entity\Page;
use EasyCorp\Bundle\EasyAdminBundle\Config\Menu\SectionMenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CodeEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Page::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title'),
            TextField::new('description'),
            BooleanField::new('isFrontpage'),
            BooleanField::new('hasCustomContent'),
            TextEditorField::new('content')->onlyOnForms(),

            AssociationField::new('blockHeaderPrimary')->onlyOnForms(),
            AssociationField::new('blockHeaderSecondary')->onlyOnForms(),
            AssociationField::new('blockHeaderTertiary')->onlyOnForms(),
            AssociationField::new('blockHeaderQuaternary')->onlyOnForms(),

            AssociationField::new('blockBodyPrimary')->onlyOnForms(),
            AssociationField::new('blockBodySecondary')->onlyOnForms(),
            AssociationField::new('blockBodyTertiary')->onlyOnForms(),
            AssociationField::new('blockBodyQuaternary')->onlyOnForms(),

            AssociationField::new('blockSidebarPrimary')->onlyOnForms(),
            AssociationField::new('blockSidebarSecondary')->onlyOnForms(),
            AssociationField::new('blockSidebarTertiary')->onlyOnForms(),
            AssociationField::new('blockSidebarQuaternary')->onlyOnForms(),

            AssociationField::new('blockFooterPrimary')->onlyOnForms(),
            AssociationField::new('blockFooterSecondary')->onlyOnForms(),
            AssociationField::new('blockFooterTertiary')->onlyOnForms(),
            AssociationField::new('blockFooterQuaternary')->onlyOnForms(),
        ];
    }

}
