<?php

namespace App\Controller;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ColorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        $roles = [];
        $userRoles = $this->getUser()->getAllRoles(
            $this->getParameter('security.role_hierarchy.roles')
        );

        foreach ($userRoles as $userRole)
        {
            $key = ucFirst(strtolower(
                str_replace('ROLE_', '', $userRole)
            ));
            
            $roles[$key] = $userRole;
        }

        return [
            // IdField::new('id')->onlyOnIndex(),
            TextField::new('email'),
            TextField::new('name'),
            TextField::new('lastname'),
            ChoiceField::new('roles')
                ->allowMultipleChoices()
                ->setChoices($roles)
                ->setSortable(false),
            AssociationField::new('supervisor'),
            ColorField::new('color'),
        ];
    }
    
}
