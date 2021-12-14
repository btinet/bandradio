<?php

namespace App\Controller\Admin;

use App\Entity\Post;
use App\Field\VichImageField;
use App\Field\VichTagImageField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\DomCrawler\Field\FileFormField;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Vich\UploaderBundle\Mapping\Annotation\UploadableField;

class PostCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Post::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            VichImageField::new('image')->hideOnForm(),
            TextField::new('title'),
            TextField::new('description'),
            TextEditorField::new('content')->hideOnIndex(),
            AssociationField::new('contentType'),
            AssociationField::new('tags')->hideOnIndex(),
            VichTagImageField::new('imageFile')->onlyOnForms(),
            AssociationField::new('createdBy'),
            BooleanField::new('isPublished')
        ];
    }

}
