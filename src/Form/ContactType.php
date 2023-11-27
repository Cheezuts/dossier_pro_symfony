<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            // ->add('username')
            // ->add('email')
            // ->add('subject')
            // ->add('message')
            // ->add('createAt')
            ->add('username', TextType::class, [
                'label' => '<strong>Nom</strong>',
                'label_html' => true,
                'attr' => [
                    'class' => 'form-control m-3'
                ]
            ])
            ->add('email', TextType::class, [
                'label' => '<strong>email</strong>',
                'label_html' => true,
                'attr' => [
                    'class' => 'form-control m-3'
                ]
            ])
            ->add('subject', TextType::class, [
                'label' => '<strong>sujet</strong>',
                'label_html' => true,
                'attr' => [
                    'class' => 'form-control m-3'
                ]
            ])
            ->add('message', TextareaType::class, [
                'label' => '<strong>Message</strong>',
                'label_html' => true,
                'attr' => [
                    'class' => 'form-control m-3',
                    'rows' => 6,
                ],
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Envoyer',
                'attr' => [
                    'class' => 'btn btn-primary btn-lg m-3'
                ]
            ]);;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
