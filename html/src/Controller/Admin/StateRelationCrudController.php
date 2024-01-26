<?php

namespace App\Controller\Admin;

use App\Entity\StateRelation;
use App\Repository\StateRepository;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class StateRelationCrudController extends AbstractCrudController
{
    // public function index(AdminContext $context)
    // {
    //     return $this->render('admin/main-dashboard.html.twig');    
    // }

    public static function getEntityFqcn(): string
    {
        return StateRelation::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->onlyOnIndex();
        yield AssociationField::new('previousState');
        yield AssociationField::new('nextState');
    }
    
}
