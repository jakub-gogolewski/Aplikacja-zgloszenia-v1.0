<?php

namespace App\Form;

use App\Entity\Task;
use App\Entity\State;
use App\Entity\StateRelation;
use App\Entity\User;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Security\Core\Security;

class TaskType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Tytuł'
            ])
            ->add('description', TextType::class, [
                'label' => 'Opis'
            ])
            ->add('startDate', DateTimeType::class, [
                'widget' => 'single_text',
                'label' => 'Data i czas rozpoczęcia'
            ])
            ->add('endDate', DateTimeType::class, [
                'widget' => 'single_text',
                'label' => 'Data i czas zakończenia'
            ])
            ->add('assigned', EntityType::class, [
                'class' => User::class,
                'choice_label' => function (User $user): string {
                    return $user->getName() . ' ' . $user->getLastName();
                },
                // 'choice_value' => 'id',
                'label' => 'Osoba odpowiedzialna',
                // 'multiple' => true
            ])
            ->add('state', EntityType::class, [
                'class' => State::class,
                // 'query_builder' => function (EntityRepository $er): QueryBuilder {
                //     return $er->createQueryBuilder('s')
                //         ->innerJoin('App\Entity\Task', 't', 'WITH', 't.state = s.id')
                //         // ->innerJoin('App\Entity\State', 's', 'WITH', 't.state = s.id')
                //         ->innerJoin('App\Entity\StateRelation', 'sr', 'WITH', 'sr.previousState=s.id')
                //         // ->orderBy('s.previousState')
                //     ;
                // },
                'choice_label' => 'name'
            ])
            ->add('id', HiddenType::class, [
                'data' => 0,
                'mapped' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Task::class,
            'csrf_protection' => false,
        ]);
    }
}