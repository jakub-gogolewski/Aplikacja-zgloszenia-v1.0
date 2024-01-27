<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Regex;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('name', null, [
            'constraints' => [
        	    new Regex([
                    'pattern' => '/^(\p{L}+[- ]?)+$/u',
                    'message' => 'Pole może zawierać jedynie litery, spację i myślnik',
                ]),
			],
			'attr' => [
		    	'class' => 'form-control',
				'placeholder' => 'Imię'
			]
	    ])
        ->add('lastname', null, [
			'constraints' => [
				new Regex([
					'pattern' => '/^(\p{L}+[- ]?)+$/u',
					'message' => 'Pole może zawierać jedynie litery, spację i myślnik'
				]),
			],
	   		'attr' => [
			    'class' => 'form-control',
				'placeholder' => 'Nazwisko'
			]
	    ])
            ->add('email', EmailType::class, [
                'constraints' => [
                    new Email([
                        'mode' => 'strict',
                        'message' => 'E-mail ma niepoprawny format'
                    ]),
                ],
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'E-mail'
                ]
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'label' => 'Akceptuję regulamin i politykę prywatności',
                'mapped' => false,
                'attr' => [
                    'class' => 'custom-control-input',
                ],
                'constraints' => [
                    new IsTrue([
                        'message' => 'musisz to zaakceptować',
                    ]),
                ],
            ])
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password','class' => 'form-control', 'placeholder' => 'Hasło'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Hasło nie może być puset'
                    ]),
                    new Length([
                        'min' => 8,
                        'minMessage' => 'Minimalna długość hasła: {{ limit }} znaków',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                    new Regex([
                        'pattern'=>"/.*[A-Z].*/",
                        'message'=>"Hasło musi mieć minimum jedną dużą literę"
                    ]),
                    new Regex([
                        'pattern'=>"/.*[a-z].*/",
                        'message'=>"Hasło musi mieć minimum jedną małą literę"
                    ]),
                    new Regex([
                        'pattern'=>"/.*[0-9].*/",
                        'message'=>"Hasło musi mieć minimum jedną cyfrę"
                    ]),
                    new Regex([
                        'pattern'=>"/.*[\W].*/",
                        'message'=>"Hasło musi mieć minimum jeden znak specjalny"
                    ]),
                    new Regex([
                        'pattern'=>"/^[^\s]*$/",
                        'message'=>"Hasło nie może zawierać spacji"
                    ]),
                ],
            ])
            ->add('repeatPassword', PasswordType::class, [
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password', 'class' => 'form-control', 'placeholder' => 'Powtórz hasło'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Powtórzenie hasła nie może być puste',
                    ]),
                ],
            ])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
