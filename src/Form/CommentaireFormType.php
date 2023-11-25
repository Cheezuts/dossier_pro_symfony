<?php

namespace App\Form;

use App\Entity\Commentaire;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class CommentaireFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            ->add('nom', TextType::class, [
                'label' => '<strong>Nom</strong>',
                'label_html' => true,
                'attr' => [
                    'class' => 'form-control m-3'
                ]
            ])
            ->add('prenom', TextType::class, [
                'label' => '<strong>Prénom</strong>',
                'label_html' => true,
                'attr' => [
                    'class' => 'form-control m-3'
                ]
            ])
            ->add('contenu', TextareaType::class, [
                'label' => '<strong>Commentaire</strong>',
                'label_html' => true,
                'attr' => [
                    'class' => 'form-control m-3',
                    'rows' => 6,
                ],
            ])
            ->add('note', ChoiceType::class, [
                'choices' => [
                    '1' => 1,
                    '2' => 2,
                    '3' => 3,
                    '4' => 4,
                    '5' => 5
                ],
                'attr' => [
                    'class' => 'form-select m-3 text-center custom-bold-options'
                ],
                'label' => '<strong>Note</strong>',
                'label_html' => true,
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Envoyer',
                'attr' => [
                    'class' => 'btn btn-primary btn-lg m-3'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Commentaire::class,
        ]);
    }
}
