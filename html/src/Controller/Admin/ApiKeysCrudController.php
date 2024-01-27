<?php

namespace App\Controller\Admin;

use App\Entity\ApiKeys;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ApiKeysCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ApiKeys::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('id')->onlyOnIndex(),
            AssociationField::new('apiUser')
        ];
    }
    
}
