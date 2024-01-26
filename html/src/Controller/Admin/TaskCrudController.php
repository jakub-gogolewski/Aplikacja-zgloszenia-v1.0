<?php

namespace App\Controller\Admin;

use App\Entity\Task;
use App\Repository\TaskRepository;
use App\Repository\EntityRepository;
use Doctrine\ORM\QueryBuilder;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class TaskCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Task::class;
    }
    
    public function configureFields(string $pageName): iterable
    {

        yield IdField::new('id')->onlyOnIndex();
        yield AssociationField::new('state');
        yield DateTimeField::new('startDate');
        yield DateTimeField::new('endDate');
        yield AssociationField::new('creator');
        yield AssociationField::new('assigned');

        // return [
        //     IdField::new('id'),
        //     TextField::new('title'),
        //     TextEditorField::new('description'),
        // ];
    }
    
}
